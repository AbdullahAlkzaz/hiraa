<?php
  
namespace App\Imports;
  
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\RequestPrice;
  
class PricesImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RequestPrice([
            'product_number'     => $row["product_number"],
            'price'    => $row["price"],
            'brand'    => $row["brand"],
            'brand_type'    => $row["brand_type"],
        ]);
    }

    public function rules(): array
    {
        return [
            '*.product_number' => 'required',
            '*.price' => 'required|numeric',
            '*.brand' => 'required',
            '*.brand_type' => 'required',
        ];
    }
  
}