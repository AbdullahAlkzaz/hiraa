<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Notification;
use App\Models\Price;
use App\Models\Transaction;
use App\Models\Type;
use App\Models\User;
use App\Models\Wallet;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShipmentController extends Controller
{
    private ShipmentRepositoryInterface $repository;
    private Price $priceModel;
    private Transaction $transactionModel;
    private User $userModel;
    private Notification $notificationModel;
    public function __construct(
        ShipmentRepositoryInterface $repository,
        Price $priceModel,
        User $userModel,
        Transaction $transactionModel,
        Notification $notificationModel
    ) {
        $this->repository = $repository;
        $this->priceModel = $priceModel;
        $this->userModel = $userModel;
        $this->transactionModel = $transactionModel;
        $this->notificationModel = $notificationModel;
    }
    public function index(Request $request)
    {
        $shipments = $this->repository->getShipments($request->all());
        return view("point.shipments.shipments")->with([
            'shipments' => $shipments,
        ]);
    }
    public function create()
    {
        $governments = $this->priceModel->groupBy("government")->pluck("government")->toArray();
        $areas = $this->priceModel->groupBy("area")->pluck("area")->toArray();
        return view("point.shipments.shipment_add")->with([
            'governments' => $governments,
            'areas' => $areas,
            'sizes' => Price::SIZES,
        ]);
    }

    public function store(CreateShipmentRequest $request)
    {
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->validated();
            unset($data['creator_type']);
            $shipment = $this->repository->create($data);
            $client = $this->createSellerIfNotExists($data);
            if ($client && $client->wallet) {
                $client_wallet = $client->wallet;
                if ($client_wallet) {
                    $transaction_data = [
                        "amount" => $shipment->client_price,
                        "type" => "credit",
                        "operation_id" => $shipment->id,
                        "operation_type" => "شحنة",
                        "wallet_id" => $client_wallet->id,
                        "description" => "المبلغ المرسل مع الشحنة",
                    ];
                    $transaction = $this->transactionModel->setTransaction($transaction_data);

                }
            }
            $admin_user = $this->userModel->where("email", User::ADMIN_EMAIL)->first();
            if ($admin_user) {
                $admin_wallet = $admin_user->wallet;
                if ($admin_wallet) {
                    $transaction_data = [
                        "amount" => $shipment->point_price,
                        "type" => "credit",
                        "operation_id" => $shipment->id,
                        "operation_type" => "شحنة",
                        "wallet_id" => $admin_wallet->id,
                        "description" => "ثمن الشحن مستحق لبوينت",
                    ];
                    $transaction = $this->transactionModel->setTransaction($transaction_data);

                }
            }
            $user_wallet = auth()->user()->wallet;
            if ($user_wallet) {
                $transaction_data = [
                    "amount" => $shipment->client_price,
                    "type" => "debit",
                    "operation_id" => $shipment->id,
                    "operation_type" => "شحنة",
                    "wallet_id" => $user_wallet->id,
                    "description" => "المبلغ المرسل للعميل",
                ];
                $transaction = $this->transactionModel->setTransaction($transaction_data);
            }
            $client_notification_data = [
                "user_id" => $client->id,
                "body" => " تم ارسال المبلغ الخاص بالشحنة من العميل". auth()->user()->name  ,
            ];
            $this->setNotification($client_notification_data);
            $admin_notification_data = [
                "user_id" => $admin_user->id,
                "url" => url("transactions"),
                "body" => "تم استلام التحويل الخاص بثمن الشحن من الشحنة رقم" . $shipment->id 
            ];
            $this->setNotification($admin_notification_data);
            $shipment_notificatgion = [
                "user_id" => $admin_user->id,
                "url" => url("shipments"),
                "body" => "تم إنشاء شحنة جديدةقم بفحصها من فضلك"
            ];
            $this->setNotification($shipment_notificatgion);
            DB::commit();
            session()->flash('message', __("تم إنشاء الشحنة بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }
    public function getAreas(Request $request, $government)
    {
        $areas = $this->priceModel->where("government", $government)->pluck("area")->toArray();
        if ($request->sender == 1) {
            return view("point.shipments.component.shipment_sender_area")->with([
                'government_areas' => $areas,
            ]);
        }
        if ($request->signup == 1) {
            return view("point.shipments.component.signup_area")->with([
                'government_areas' => $areas,
            ]);
        }
        return view("point.shipments.component.shipment_area")->with([
            'government_areas' => $areas,
        ]);
    }
    public function getPrice($size, $area, $government)
    {
        $shipmentPrice = $this->priceModel->where("size", $size)->where("area", $area)->where("government", $government)->first();
        if (!$shipmentPrice) {
            return false;
        }
        return $shipmentPrice->price;
    }

    public function show($id)
    {
        $shipment = $this->repository->where("id", $id)->first();
        $governments = $this->priceModel->groupBy("government")->pluck("government")->toArray();
        $areas = $this->priceModel->groupBy("area")->pluck("area")->toArray();
        return view("point.shipments.shipment_view")->with([
            'governments' => $governments,
            'areas' => $areas,
            'sizes' => Price::SIZES,
            'shipment' => $shipment,
        ]);
    }
    public function update(UpdateShipmentRequest $request)
    {
        if (session()->has('validation_message')) {
            session()->flash('message', session("validation_message"));
            return back();
        }
        try {
            DB::beginTransaction();
            $data = $request->validated();
            unset($data['creator_type']);
            $this->repository->updateById($data["id"], $data);
            DB::commit();
            session()->flash('message', __("تم تعديل الشحنة بنجاح"));
            return back();
        } catch (Exception $exception) {
            DB::rollBack();
            session()->flash('message', $exception->getMessage());
            return back();
        }
    }

    public function delete($id)
    {
        $this->repository->deleteById($id);

        session()->flash("message", "تم حذف الشحنة");
        return back();
    }
    public function createSellerIfNotExists($data)
    {
        $client = $this->userModel->where("phone", $data['receiver_phone'])->first();
        if ($client and $client->type_id == Type::SELLER_TYPE) {
            return $client;
        } else if ($client) {
            return null;
        }
        $client_data = [
            "email" => Str::slug($data['receiver_name']) . $data['receiver_phone'] . "@point.com",
            "name" => $data['receiver_name'],
            "password" => $data['receiver_phone'] . "-point-123321",
            "phone" => $data['receiver_phone'],
            "type_id" => Type::SELLER_TYPE,
            "is_seller" => 0,
            "id_number" => $data['receiver_id'],
            "address_1" => $data['receiver_address'],
            "gender" => "0",
            "government" => $data['receiver_government'],
            "city" => $data['receiver_government'],
            "area" => $data['receiver_area'],
            "approved" => 0
        ];
        $client = $this->userModel->create($client_data);
        $client->markEmailAsVerified();
        Wallet::create([
            "user_id" => $client->id
        ]);
        return $client;
    }

    public function setNotification($data){
        $notification = $this->notificationModel->create($data);
    }


}