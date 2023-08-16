<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerStatisticsExport implements FromArray, WithHeadings, WithHeadingRow, ShouldAutoSize, WithMapping
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
            'Subscriber ID',
            'Subscriber Name',
            'Subscriber Email',
            'Subscriber Mobile',
            'Orders Count',
            'Total Price',
            'Percentage Of Orders',
            'Average of orders',
        ];
    }

    public function array(): array
    {
        return $this->data;
    }

    public function map($row): array
    {
        return [
            $row['subscriber_id'],
            $row['subscriber_name'],
            $row['subscriber_email'],
            $row['subscriber_mobile'],
            $row['orders_count'],
            $row['total_price'],
            $row['percentage_of_orders'],
            $row['average_price'],
        ];
    }
}
