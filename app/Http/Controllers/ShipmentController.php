<?php

namespace App\Http\Controllers;

use App\Exports\ExportShipment;
use App\Http\Requests\CreateShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Coupon;
use App\Models\Notification;
use App\Models\Price;
use App\Models\Shipment;
use App\Models\Transaction;
use App\Models\Type;
use App\Models\User;
use App\Models\Wallet;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ShipmentController extends Controller
{
    private ShipmentRepositoryInterface $repository;
    private Price $priceModel;
    private Transaction $transactionModel;
    private User $userModel;
    private Notification $notificationModel;
    private Coupon $couponModel;
    public function __construct(
        ShipmentRepositoryInterface $repository,
        Price $priceModel,
        User $userModel,
        Transaction $transactionModel,
        Notification $notificationModel,
        Coupon $couponModel
    ) {
        $this->repository = $repository;
        $this->priceModel = $priceModel;
        $this->userModel = $userModel;
        $this->transactionModel = $transactionModel;
        $this->notificationModel = $notificationModel;
        $this->couponModel = $couponModel;
    }
    public function index(Request $request)
    {
        $shipments = $this->repository->getShipments($request->all());
        $companies = $this->userModel->where("type_id", Type::COMPANY_TYPE)->where("approved", 1)->get();
        $offices = [];
        if(auth()->user()->type_id == Type::COMPANY_TYPE){
            $offices = $this->userModel->where("type_id", Type::OFFICE_TYPE)->where("company_id", auth()->user()->id)->where("approved", 1)->get();
        }
        $repres = $this->userModel->where("type_id", Type::REPRESENTATIVE_TYPE)->where(function($query){
            if(auth()->user()->hasRole("admin")){
                $query->where("company_id", auth()->user()->id)->orWhereNull("company_id");
            }elseif(auth()->user()->type_id == Type::COMPANY_TYPE){
                $query->where("company_id", auth()->user()->id);
            }elseif(auth()->user()->type_id == Type::OFFICE_TYPE){
                $query->where("office_id", auth()->user()->id);
            }
        })->where("approved", 1)->get();
        return view("point.shipments.shipments")->with([
            'shipments' => $shipments,
            'companies' => $companies,
            'repres' => $repres,
            'offices' => $offices,
            'statuses' => Shipment::STATUSES,
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
            $code_flag = false;
            if($request->coupon_code && $request->coupon_code !=""){
                $code = $this->couponModel->where("code", $request->coupon_code)->first();
                if((int)$code?->usages > 0 ){
                    $code->usages = $code->usages - 1;
                    $code->update();
                    $code_flag = true;
                    $data['point_price'] = $data['point_price'] - (($data['point_price'] * $code->percentage) / 100);
                }
            }
            $admin_user = $this->userModel->where("email", User::ADMIN_EMAIL)->first();
            if (auth()->user()->id == $admin_user->id) {
                $data['status'] = "نقطة أ";
            } else {
                $data['status'] = "الإستلام";
            }
            $shipment = $this->repository->create($data);
            $client = $this->createSellerIfNotExists($data);
            DB::commit();
            $message = "تم انشاء الشحنة بدون كود خصم";
            if($code_flag){
                $message = "تم انشاء الشحنة بكود الخصم";
            }
            session()->flash('message', $message);
            return Excel::download(new ExportShipment, 'shipment.xlsx');
            if ($request->confirm_flag == 1) {
                return back();
            } else {
                return redirect(route("shipments.index"));
            }
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
        $shipmentPrice = $this->priceModel
        ->where("size", $size)
        ->where("area", $area)
        ->where("government", $government)
        ->where("from_area",auth()->user()->area)
        ->where("from_government",auth()->user()->government)
        ->first();
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
            // "id_number" => $data['receiver_id'],
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

    public function setNotification($data)
    {
        $notification = $this->notificationModel->create($data);
    }

    public function changeStatus(Request $request)
    {
        $shipment = $this->repository->where("id", $request->shipment_id)->first();
        if (!in_array($request->status, Shipment::STATUSES)) {
            return 0;
        }
        $data = [
            "status" => $request->status,
            "status_reason" => $request->reason,
            "status_date" => now()->format("Y-m-d")
        ];
        $update = $shipment->update($data);
        $shipment->refresh();
        $transaction = $this->transactionModel->where("operation_id", $shipment->id)->first();
        if ($request->status == Shipment::COMPLETED && !$transaction) {
            $admin_user = $this->userModel->where("email", User::ADMIN_EMAIL)->first();
            $client = $this->userModel->where("phone", $shipment->receiver_phone)->first();
            if ($client && $client->wallet) {
                $client_wallet = $client->wallet;
                if ($client_wallet) {
                    $transaction_data = [
                        "amount" => $shipment->client_price,
                        "type" => "credit",
                        "operation_id" => $shipment->id,
                        "operation_type" => "شحنة",
                        "show" => 0,
                        "wallet_id" => $client_wallet->id,
                        "description" => "المبلغ المرسل مع الشحنة",
                    ];
                    $this->transactionModel->setTransaction($transaction_data);

                }
            }
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
                    $this->transactionModel->setTransaction($transaction_data);

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
                $this->transactionModel->setTransaction($transaction_data);
            }
            $client_notification_data = [
                "user_id" => $client->id,
                "body" => " تم ارسال المبلغ الخاص بالشحنة من العميل" . auth()->user()->name,
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
        }
        return $update;

    }
    public function getClientByPhone($phone){
        $client = $this->userModel->where("phone", $phone)->first();
        if($client){
            return [
                "name" => $client->name,
                "address" => $client->address_1 . " . " . $client->address_2,
            ];
        }
        return 0;
    }

    public function assignRepresentative(Request $request){
        $update = $this->repository->updateById($request->shipment_id,['representative_id' => $request->representative_id]);
        if($update){
            return 1;
        }
        return 0;
    }
    public function assignCompany(Request $request){
        $update = $this->repository->updateById($request->shipment_id,['company_id' => $request->company_id]);
        if($update){
            return 1;
        }
        return 0;
    }
    public function assignOffice(Request $request){
        $update = $this->repository->updateById($request->shipment_id,['office_id' => $request->office_id]);
        if($update){
            return 1;
        }
        return 0;
    }


}