<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DatasController extends Controller
{

    /**
     * 
     * @return Response
     */
    public function getProduct()
    {
        $data = DB::select('select id,title text from products');
        return $data;
    }
}
