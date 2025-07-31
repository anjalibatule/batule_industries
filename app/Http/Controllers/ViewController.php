<?php

namespace App\Http\Controllers;
use  App\Models\User;
use  App\Models\Company;
use App\Models\Contact;
use App\Models\Invoice;
use  App\Models\InvoiceDescr;
use App\Models\PurchaseOrder;
use App\Models\Bank;



use Illuminate\Http\Request;
// use count;

class ViewController extends Controller
{
     public function dashboard()
    {
        $admin = User::where('role','Admin')->get();
        return view('dashboard',['admin'=> $admin ]);
    }
     public function index()
    {
        return view('index');
    }
      public function sale()
    {
          $invoices = Invoice::with('company')->where('status',1)->orderBy('invoice_number','desc')->paginate(8);
          return view('sale',['invoices'=>$invoices]);
    }
    public function purchase_order(){
         $purchase = PurchaseOrder::with('company')->orderBy('created_at','desc')->paginate(8);
       return view('purchase_order',['purchase'=>$purchase]);
    }
     public function status()
    {
          $invoices = Invoice::with('company')->where('status',1)->orderBy('invoice_number','desc')->paginate(8);
          return view('status',['invoices'=>$invoices]);
    }
     public function inactive_status()
    {
          $invoices = Invoice::with('company')->where('status',0)->orderBy('invoice_number','desc')->paginate(8);
          return view('inactive_status',['invoices'=>$invoices]);
    }
     public function payment()
    {
          $invoices = Invoice::with('company')->where('payment',1)->orderBy('invoice_number','desc')->paginate(8);
          return view('payment',['invoices'=>$invoices]);
    }
     public function inactive_payment()
    {
          $invoices = Invoice::with('company')->where('payment',0)->orderBy('invoice_number','desc')->paginate(8);
          return view('inactive_payment',['invoices'=>$invoices]);
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
           $contact->owner = $request->owner_name;
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
       public function bank_detail()
    {
        // dd(1);
        $bank = Bank::find(1);
        return view('bank',['bank'=> $bank]);
    }
     public function bank_update(Request $request,$id)
    {
       $bank= Bank::find($id);
         $bank->bank_name = $request->bank_name;
           $bank->address = $request->address;
         $bank->account = $request->account;
         $bank->account_branch = $request->account_branch;
         $bank->ifsc = $request->ifsc ?? null;
         $bank->micr = $request->micr ?? null;
         $bank->swif = $request->swif ?? null;
         if($bank->save()){
            return back()->with('success','Bank details updated successfully');
              
         }
         else{
            return back()->with('error','Bank details not updated');
         }
    }
}

