<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ProductImport implements ToModel, WithHeadingRow
{

    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }
        return new Product([
            'name' => $row['name'],
            'description' => $row['description'],
            'category_id' => $row['category_id'],
            'price' => $row['price'],
        ]);
    }
}




