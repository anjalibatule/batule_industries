<?php

namespace App\Http\Controllers;
use  App\Models\User;
use  App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;
use  App\Models\InvoiceDescr;


use Illuminate\Http\Request;

class SearchController extends Controller
{
     public function search_invoice_number(Request $request){
        $search = $request->search;

    $invoices = Invoice::with('company')
        ->where('status', '1')
        ->where(function ($query) use ($search) {
            $query->where('invoice_number', 'like', "%$search%")
                // ->orWhere('invoice_date', 'like', "%$search%")
                ->orWhereRelation('company', 'company_name', 'like', "%$search%")
                // ->orWhereRelation('company', 'gst_no', 'like', "%$search%")
        ;})
        ->orderBy('invoice_number', 'desc')
        ->paginate(5)
        ->withQueryString();

        return view('sale',['invoices'=>$invoices,'search'=>$search]);
    
    
      }
    public function search_status(Request $request){
       $search = $request->search;

    $invoices = Invoice::with('company')
        ->where('status', '1')
        ->where(function ($query) use ($search) {
            $query->where('invoice_number', 'like', "%$search%")
                // ->orWhere('invoice_date', 'like', "%$search%")
                ->orWhereRelation('company', 'company_name', 'like', "%$search%")
                // ->orWhereRelation('company', 'gst_no', 'like', "%$search%")
        ;})
        ->orderBy('invoice_number', 'desc')
        ->paginate(5)
        ->withQueryString();
        return view('status',['invoices'=>$invoices,'search'=>$search]);
    }
     public function search_inactive_status(Request $request){
        $search = $request->search;

        $invoices = Invoice::with('company')
            ->where('status', '0')
            ->where(function ($query) use ($search) {
                $query->where('invoice_number', 'like', "%$search%")
                    // ->orWhere('invoice_date', 'like', "%$search%")
                    ->orWhereRelation('company', 'company_name', 'like', "%$search%")
                    // ->orWhereRelation('company', 'gst_no', 'like', "%$search%")
            ;})
            ->orderBy('invoice_number', 'desc')
            ->paginate(5)
            ->withQueryString();
            return view('inactive_status',['invoices'=>$invoices,'search'=>$search]);
    }
     public function search_payment(Request $request){
       $search = $request->search;

    $invoices = Invoice::with('company')
        ->where('payment', '1')
        ->where(function ($query) use ($search) {
            $query->where('invoice_number', 'like', "%$search%")
                // ->orWhere('invoice_date', 'like', "%$search%")
                ->orWhereRelation('company', 'company_name', 'like', "%$search%")
                // ->orWhereRelation('company', 'gst_no', 'like', "%$search%")
        ;})
        ->orderBy('invoice_number', 'desc')
        ->paginate(5)
        ->withQueryString();
        return view('payment',['invoices'=>$invoices,'search'=>$search]);
    }
     public function search_inactive_payment(Request $request){
         $search = $request->search;

    $invoices = Invoice::with('company')
        ->where('payment', '0')
        ->where(function ($query) use ($search) {
            $query->where('invoice_number', 'like', "%$search%")
                // ->orWhere('invoice_date', 'like', "%$search%")
                ->orWhereRelation('company', 'company_name', 'like', "%$search%")
                // ->orWhereRelation('company', 'gst_no', 'like', "%$search%")
        ;})
        ->orderBy('invoice_number', 'desc')
        ->paginate(5)
        ->withQueryString();
        return view('inactive_payment',['invoices'=>$invoices,'search'=>$search]);
    }
     public function search_company_name(Request $request){
       
        $companyData = Company::where('status','1')
        ->where(function($query) use ($request) {
                $query->where('company_name','like',"%$request->search%")
                ->orwhere('gst_no','like',"%$request->search%")
                ->orwhere('date','like',"%$request->search%")
                ->orwhere('company_email','like',"%$request->search%")
                ->orwhere('company_mobile','like',"%$request->search%")
                ->orwhere('company_address','like',"%$request->search%")
                ->orwhere('status','like',"%$request->search%");
        })
        ->orderBy('company_name', 'asc')
        ->paginate(5)
        ->withQueryString();
        return view('company',['company'=>$companyData,'search'=>$request->search]);
    }
     public function search_inactive_company_name(Request $request){
        // dd($request->search);
        $companyData = Company::where('status','0')
        ->where(function($query) use ($request) {
                $query->where('company_name','like',"%$request->search%")
                ->orwhere('gst_no','like',"%$request->search%")
                ->orwhere('date','like',"%$request->search%")
                ->orwhere('company_email','like',"%$request->search%")
                ->orwhere('company_mobile','like',"%$request->search%")
                ->orwhere('company_address','like',"%$request->search%")
                 ->orwhere('status','like',"%$request->search%");
        })
        ->orderBy('company_name', 'asc')
        ->paginate(5)
        ->withQueryString();
        return view('inactive_company',['company'=>$companyData,'search'=>$request->search]);
    }

     public function search_name(Request $request)
    {
        $userData = User::where('role', 'User')
        ->where(function($query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%")
                ->orWhere('email', 'like', "%{$request->search}%")
                ->orWhere('phone', 'like', "%{$request->search}%")
                ->orWhere('role', 'like', "%{$request->search}%");
        })
        ->orderBy('name', 'asc')
        ->paginate(5)
        ->withQueryString();
        return view('user',['users'=>$userData,'search'=>$request->search]);
    
    }
    
}
