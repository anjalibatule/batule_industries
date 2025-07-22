<?php

namespace App\Http\Controllers;
use  App\Models\User;
use  App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;
use  App\Models\InvoiceDescr;


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
      public function sale()
    {
          $invoices = Invoice::with('company')->orderBy('invoice_number','desc')->paginate(8);
          return view('sale',['invoices'=>$invoices]);
    }
     public function add_invoice()
    {
         // Fetch the latest invoice
         $lastInvoice = Invoice::orderBy('id', 'desc')->first();

        // If an invoice exists, increment its number; otherwise, start with 1
         $invoice_number = $lastInvoice ? $lastInvoice->invoice_number + 1 : 1;
        //   dd($invoice_number);
          $Company = Company::all();
         $contact = Contact::find(1);
          return view('add_invoice',['invoice_number'=>$invoice_number,'Company'=>$Company,'contact'=>$contact]);
        

    }

    public function search_name(Request $request)
    {
    $userData = User::where('name','like',"%$request->search%")
               ->orwhere('email','like',"%$request->search%")
               ->orwhere('phone','like',"%$request->search%")
               ->orwhere('role','like',"%$request->search%")
               ->orderBy('name', 'asc')
               ->paginate(5)
               ->withQueryString();
            return view('user',['users'=>$userData,'search'=>$request->search]);
    }   
     public function search_company_name(Request $request){
        // dd($request->search);
        $companyData = Company::where('company_name','like',"%$request->search%")
        ->orwhere('gst_no','like',"%$request->search%")
        ->orwhere('state','like',"%$request->search%")
        ->orwhere('date','like',"%$request->search%")
        ->orwhere('company_email','like',"%$request->search%")
        ->orwhere('company_mobile','like',"%$request->search%")
        ->orwhere('company_address','like',"%$request->search%")
        ->orderBy('company_name', 'asc')
        ->paginate(5)
        ->withQueryString();
        return view('company',['company'=>$companyData,'search'=>$request->search]);
    }
     public function search_invoice_number(Request $request){
        $search = $request->search;
       $invoices = Invoice::with('company')
        ->where('invoice_number', 'like', "%$search%")
        ->orWhere('invoice_date', 'like', "%$search%")
        ->orWhere(function ($query) use ($search) {
            $query->whereHas('company', function ($q) use ($search) {
                $q->where('company_name', 'like', "%$search%")
                  ->orWhere('gst_no', 'like', "%$search%");
            });
        })
        ->orderBy('invoice_number', 'desc')
        ->paginate(5)
        ->withQueryString();
        return view('sale',['invoices'=>$invoices,'search'=>$search]);
    }
      public function contact_detail()
    {
        // dd(1);
        $contact = Contact::where('id',1)->first();
        return view('contact_detail',['contact'=> $contact]);
    }
     public function contact_update(Request $request,$id)
    {
        // dd($request->all());
        $contact= Contact::find($id);
         $contact->contact_company_name = $request->company_name;
         $contact->contact_email = $request->contactEmail;
         $contact->contact_number = $request->mob;
         $contact->gst_number = $request->gstNumber;
         $contact->contact_address = $request->contactAddress;
         $contact->map = $request->contact_map;
         if($contact->save()){
            return back()->with('success','Contact details updated successfully');
              
         }
         else{
            return back()->with('error','Contact details not updated');
         }
    }

    public function invoice_update($id){
          $invoices = Invoice::with(['company','invoice_desc'])->where('id',$id)->first();
          // dd( $invoices);
          $contact = Contact::find(1);
          $companies = Company::all();
          return view('invoice_update',['invoices'=>$invoices,'contact'=>$contact,'companies' =>$companies]);
    }
}

