<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DatasController extends Controller
{

    public function getProduct()
    {
        $data = DB::select('select id,title text from products');
        return $data;
    }

    public function getCustomer()
    {
        $data = DB::select('select id,name text from customers');
        return $data;
    }

    public function getProductSku()
    {
        $data = DB::select('select id,title text from product_skus');
        return $data;
    }
}
