<?php
namespace App\Services;

use App\Http\Traits\ApiTrait;
use App\Http\Traits\QVMTrait;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderInvoice;

class InvoiceHelper
{
    use ApiTrait;
    use QVMTrait;

    private PurchaseOrderInvoice $invoiceModel;
    private PurchaseOrder $purchaseOrderModel;
    public function __construct(PurchaseOrderInvoice $invoiceModel, PurchaseOrder $purchaseOrderModel){
        $this->invoiceModel = $invoiceModel;
        $this->purchaseOrderModel = $purchaseOrderModel;
    }

    public function getInvoices($customer_id = null){
        $invoices = $this->invoiceModel;
        if($customer_id){
            $purchase_orders_ids = $this->purchaseOrderModel->where('subscriber_id', $customer_id)->pluck("id")->toArray();
            $invoices = $invoices->whereIn("purchase_order_id", $purchase_orders_ids);
        }
        return $invoices->paginate(10);
    }
}