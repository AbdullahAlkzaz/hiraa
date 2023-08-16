<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;

class RFQHelper
{
    use ApiTrait;
    use QVMTrait;

    
    public static function round_profit_ratio($profit_ratio)
    {
        return round($profit_ratio, 2);
    }


}
