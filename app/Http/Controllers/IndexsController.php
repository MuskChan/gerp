<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexsController extends Controller
{
    public function index()
    {
        return view('indexs.index');
    }
}
