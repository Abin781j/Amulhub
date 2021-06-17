<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('title','slug','summary','description','cat_id','child_cat_id','price','discount','status','photo','supplier','warehouse','expiry_date','buying_date','volume','stock','is_featured','condition')->get();
    }

    
}
