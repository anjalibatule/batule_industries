<?php

namespace App\Http\Controllers;
use  App\Models\User;
use  App\Models\Company;
use Illuminate\Http\Request;
// use count;

class ViewController extends Controller
{
     public function dashboard()
    {
        // $company = Company::all();
        return view('dashboard');
    }
     public function index()
    {
        return view('index');
    }

    public function search_name(Request $request)
    {
    $userData = User::where('name','like',"%$request->search%")->orderBy('name', 'asc')
                        ->paginate(5)
                        ->withQueryString();
            return view('user',['users'=>$userData,'search'=>$request->search]);
    }   
     public function search_company_name(Request $request){
        // dd($request->search);
        $companyData = Company::where('company_name','like',"%$request->search%")->orderBy('company_name', 'asc')
                    ->paginate(5)
                    ->withQueryString();
        return view('company',['company'=>$companyData,'search'=>$request->search]);
    }
   
}

