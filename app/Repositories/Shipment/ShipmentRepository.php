<?php

namespace App\Repositories\Shipment;

use App\Models\Shipment;
use App\Models\Type;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

//use Your Model

/**
 * Class UserRepository.
 */
class ShipmentRepository extends BaseRepository implements ShipmentRepositoryInterface
{
    protected $model;
    public function __construct(Shipment $model){
        $this->model = $model;
    }
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Shipment::class;
    }
    public function getShipments(array $data){
        $shipments = $this->model
        ->where(function($query) use($data){
            if(isset($data['sender_name']) && $data['sender_name'] != ""){
                $query->where("sender_name", $data['sender_name']);
            }
            if(isset($data['receiver_name']) && $data['receiver_name'] != ""){
                $query->where("receiver_name", $data['receiver_name']);
            }
            if(isset($data['receiver_phone']) && $data['receiver_phone'] != ""){
                $query->where("receiver_phone", $data['receiver_phone']);
            }
            if(isset($data['sender_phone']) && $data['sender_phone'] != ""){
                $query->where("sender_phone", $data['sender_phone']);
            }
            if(isset($data['id']) && $data['id'] != ""){
                $query->where("id", $data['id']);
            }
            if(auth()->user()->type_id == Type::REPRESENTATIVE_TYPE){
                $query->where("company_id", auth()->user()->company_id)
                ->where("office_id", auth()->user()->office_id);
            }elseif(auth()->user()->type_id == Type::SELLER_TYPE){
                $query->where("company_id", auth()->user()->id);
            }
        })
        ->orderBy("id", "DESC")
        ->paginate(10);
        return $shipments;
    }
    
    
}
