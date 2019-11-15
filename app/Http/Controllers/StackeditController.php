<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StackeditController extends Controller
{
    public function index()
    {
        return view('stackedit.index');
    }
}
