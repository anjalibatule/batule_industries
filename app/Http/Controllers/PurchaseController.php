<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function add_purchase(){
        return view('add_purchase');
    }
}
