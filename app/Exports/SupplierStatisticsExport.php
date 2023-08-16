<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SupplierStatisticsExport implements FromArray, WithHeadings, WithHeadingRow, ShouldAutoSize, WithMapping
{
    use Exportable;

    public function __construct(
        public array $data
    )
    {
    }

    public function headings(): array
    {
        return [
            'Company ID',
            'Company Name',
            'Company Email',
            'Orders Count',
            'Total Price',
            'Percentage Of Orders',
            'Average of Orders',
        ];
    }

    public function array(): array
    {
        return $this->data;
    }

    public function map($row): array
    {
        return [
            $row['company_id'],
            $row['company_name'],
            $row['company_email'],
            $row['orders_count'],
            $row['total_price'],
            $row['percentage_of_orders'],
            $row['average_price'],
        ];
    }
}
