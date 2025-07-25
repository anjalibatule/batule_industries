<?php

namespace App\Http\Controllers;
use  App\Models\Company;
use  App\Models\PurchaseOrder;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function add_purchase(){
        $company = Company::all();
        return view('add_purchase',['company'=>$company]);
    }
      public function store_purchase(Request $request){
          
                
                  // Validate company details if no company selected
                    if (!$request->company) {
                        $request->validate([
                            'companyName' => 'required|max:200',
                            'companyEmail' => 'required|email',
                            'mob' => 'required|regex:/^\+91-[6-9][0-9]{9}$/',
                            'companyAddress' => 'required|string',
                            'gstNo' => 'required|string|regex:/^[0-9]{2}[A-Z]{5}[0-9]{4}[0-9A-Z]{4}$/',
                            'date' => 'required|date',
                        ]);

                        $com = new Company();
                        $com->company_name   = $request->companyName;
                         $com->owner_name = $request->ownerName;
                        $com->company_email  = $request->companyEmail;
                        $com->company_mobile = $request->mob;
                        $com->company_address= $request->companyAddress;
                        $com->gst_no         = $request->gstNo;
                        $com->date           = $request->date;
                        $com->state          = $request->state;
                        $com->status         = '1';
                        $com->save();

                        $company_id = $com->id;
                    } else {
                        $company_id = $request->company;
                    }

                    $purchase = new PurchaseOrder();
                    $purchase->po_invoice = $request->po_no;
                    $purchase->po_date = $request->po_date;
                    $purchase->total_price = $request->totalTaxable;
                    $purchase->igst = $request->igst;
                    $purchase->cgst = $request->cgst;
                    $purchase->sgst = $request->sgst;
                    $purchase->total_amount = $request->totalAmt;
                    $purchase->company_id =$company_id;

                    if( $purchase->save()){
                        return redirect('purchase_order')->with('success','Purchase Order details added succsessfully');
                    }
                    else{
                         return back()->with('error','Purchase Order details not added succsessfully');
                    }


      }
       public function update_purchase($id){
       
        $company = Company::all();
        $purchase = PurchaseOrder::with('company')->where('id',$id)->first();
        //  dd($purchase->total_price);
        return view('update_purchase',['company'=>$company,'purchase'=>$purchase]);
    }
    public function edit_purchase(Request $request,$id){
                    // dd($request->all());
                    // dd($request->company);
                   $purchase = PurchaseOrder::find($id);
                    $purchase->po_invoice = $request->po_no;
                    $purchase->po_date = $request->po_date;
                    $purchase->total_price = $request->totalTaxable;
                    $purchase->igst = $request->igst;
                    $purchase->cgst = $request->cgst;
                    $purchase->sgst = $request->sgst;
                    $purchase->total_amount = $request->totalAmt;
                    $purchase->company_id =$request->company;
                    // dd( $purchase->save());
                    if( $purchase->save()){
                        return redirect('purchase_order')->with('success','Purchase Order details updated succsessfully');
                    }
                    else{
                         return back()->with('error','Purchase Order details not updated succsessfully');
                    }


    }


}
