<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'title'=>$row[0],
            'slug'=>$row[1],
            'summary'=>$row[2],
            'description'=>$row[3],
            'cat_id'=>$row[4],
            'child_cat_id'=>$row[5],
            'price'=>$row[6],
            'discount'=>$row[7],
            'status'=>$row[8],
            'photo'=>$row[9],
            'supplier'=>$row[10],
            'warehouse'=>$row[11],
            'expiry_date'=>$row[12],
            'buying_date'=>$row[13],
            'volume'=>$row[14],
            'stock'=>$row[15],
            'is_featured'=>$row[16],
            'condition'=>$row[17]
        ]);
    }
}
