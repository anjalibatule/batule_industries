<?php

namespace App\Http\Controllers;
use  App\Models\User;
use  App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;


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
          return view('sale');
    }
     public function add_invoice()
    {
         // Fetch the latest invoice
         $lastInvoice = Invoice::orderBy('id', 'desc')->first();

        // If an invoice exists, increment its number; otherwise, start with 1
         $invoice_number = $lastInvoice ? $lastInvoice->invoice_number + 1 : 1;
        //   dd($invoice_number);
          $Company = Company::all();
        
          return view('add_invoice',['invoice_number'=>$invoice_number,'Compy'=>$Company]);
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
}

