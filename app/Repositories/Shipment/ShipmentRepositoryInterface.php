<?php

namespace App\Repositories\Shipment;

use Illuminate\Http\Request;

interface ShipmentRepositoryInterface
{
    public function getShipments(array $data);
    
}
