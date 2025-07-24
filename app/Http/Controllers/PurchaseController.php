<?php

namespace App\Http\Controllers;
use  App\Models\Company;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function add_purchase(){
        $company = Company::all();
        return view('add_purchase',['company'=>$company]);
    }
      public function store_purchase(Request $request){
          
                 
      }

}
