<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class RunTimeSheetExport implements FromArray, WithHeadings, WithHeadingRow, ShouldAutoSize, WithMapping
{
    use Exportable;

    public function __construct(
        public array $data
    )
    {
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Created Date' ,
            'Estimated Delivery Duration' ,
            'Order Id' ,
            'Sender Id',
            'Sender Location',
            'Sender City',
            'Sender Phone',
            'Sender Name',
            'Sender Branch ID',
            'Sender Branch Name',
            'Sender Branch Phone',
            'Sender Branch Manager Name',
            'Product Number',
            'Product Name',
            'Quantity',
            'Receiver ID',
            'Receiver City',
            'Receiver Name',
            'Receiver Location',
            'Receiver Branch ID',
            'Receiver Branch Name',
            'Receiver Branch Phone',
            'Receiver Branch Manager Name',
            'Delivery Service',
            'Pickup Point Name',
            'Pickup Point Location',
            'Pickup Point Manager Name',
            'Pickup Point Manager Phone',
            'Total Order',
        ];
    }

    public function map($row): array
    {
        return [
            $row['Delivery date'] ,
            $row['Estimated Delivery Date'] ,
            $row['Order Id'] ,
            $row['Sender Id'],
            $row['Sender Location'] ,
            $row['Sender City'] ,
            (string)$row['Sender Phone'] ,
            $row['Sender Name'] ,
            $row['Sender Branch ID'],
            $row['Sender Branch Name'] ,
            (string)$row['Sender Branch Phone'] ,
            $row['Sender Branch Manager Name'] ,
            $row['Product Number'] ,
            $row['Product Name'] ,
            $row['Quantity'] ,
            $row['Receiver ID'],
            $row['Receiver City'] ,
            $row['Receiver Name'] ,
            $row['Receiver Location'] ,
            $row['Receiver Branch ID'],
            $row['Receiver Branch Name'] ,
            (string)$row['Receiver Branch Phone'] ,
            $row['Receiver Branch Manager Name'] ,
            $row['Delivery Service'] ,
            $row['Pickup Point Name'] ,
            $row['Pickup Point Location'] ,
            $row['Pickup Point Manager Name'] ,
            (string)$row['Pickup Point Manager Phone'] ,
            $row['Total Order'],
        ];
    }
}
