<?php

namespace App\Exports;

use App\Models\Shipment;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ExportShipment implements FromCollection, WithHeadings, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Shipment::orderBy("id", "DESC")->limit(1)->get();
    }
    public function prepareRows($rows)
    {
        $rows = collect($rows);
        return $rows->transform(function ($shipment) {
            $shipment->is_receive = $shipment->is_receive == 1 ? "استلام" : "تسليم";
            $shipment->open_shipment = $shipment->open_shipment == 1 ? "نعم" : "لا";
            $shipment->user_id = DB::table("users")->find($shipment->user_id)?->name;
            return $shipment;
        });
    }

    public function headings(): array
    {
        return [
            '#',
            'اسم الستلم',
            'هاتف الستلم',
            'عنوان المستلم',
            'محافظة المستلم',
            'منطقة المستلم',
            'الرقم القومي للمستلم',
            'اسم الراسل',
            'هاتف الراسل',
            'عنوان الراسل',
            'محافطة الراسل',
            'منطقة الراسل',
            'الرقم القومي للراسل',
            'وصف المنتجات',
            'عدد المنتجات',
            'حجم الشحنة',
            'رقم الشركة',
            'رقم المكتب',
            'سعر الشحن',
            'المبلغ الخاص بالعميل',
            'طريقة تحويل الاموال',
            'ملاحظات',
            'القائم بالشحنة',
            'فتح الشحنة؟',
            'تاريخ الانشاء',
            'تاريخ التحديث',
            'الشنحة استلام؟',
            'كود الخصم',
            'الحالة',
            'سبب الحالة',
            'تاريخ الحالة',
            'رقم المندوب',
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 40,
            'B' => 40,            
            'C' => 40,            
            'D' => 40,            
            'F' => 40,            
            'G' => 40,            
            'H' => 40,            
            'I' => 40,            
            'J' => 40,            
            'K' => 40,            
            'L' => 40,            
            'M' => 40,            
            'N' => 40,            
            'O' => 40,            
            'P' => 40,            
            'Q' => 40,            
            'S' => 40,            
            'T' => 40,            
            'U' => 40,            
            'V' => 40,            
            'W' => 40,            
            'X' => 40,            
            'Y' => 40,            
            'Z' => 40,            
            'AA' => 40,            
            'AB' => 40,            
            'AC' => 40,            
            'AD' => 40,            
            'AE' => 40,            
            'AF' => 40,            
            'AG' => 40,            
        ];
    }
}
