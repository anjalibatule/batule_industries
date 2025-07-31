<?php

namespace App\Http\Controllers;
use  App\Models\Company;
use  App\Models\Invoice;
use  App\Models\InvoiceDescr;
use  App\Models\POInvoice;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
  public function store_invoice(Request $request)
        {
            
                    $request->validate([
                        'invoice_no'=>'Unique:invoice,invoice_number'
                    ]);
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
                    

                     $invoice = new Invoice();
                    $invoice->invoice_number = $request->invoice_no;
                    $invoice->invoice_date   = $request->invoice_date;
                    $invoice->po_no = $request->po_no ?? null;
                    $invoice->po_date = $request->po_date ?? null;
                    $invoice->company_id     = $company_id;
                    $invoice->total_price =  $request->totalTaxable;
                    $invoice->igst =  $request->igst;
                    $invoice->cgst =  $request->cgst; 
                     $invoice->sgst =  $request->sgst; 
                    $invoice->cin =  $request->cin_no ?? null;
                      $invoice->e_way =  $request->e_way ?? null;
                      $invoice->transport =  $request->transport ?? null;
                      $invoice->vehicle_no =  $request->vehicle_no ?? null;
                      $invoice->lr_no =  $request->lr_no ?? null;     
                    $invoice->total_amount =   $request->totalAmt;
                    $invoice->payment_method = '1';
                    $invoice->payment        = '1';
                    $invoice->status         = '1';
                    $invoice->totalAmountWords  = $request->totalAmountWords;
                    $invoice->save();

                         // Loop through invoice description rows
                    foreach ($request->hsnCode as $index => $hsn) {
                            $invDesc = new InvoiceDescr();
                            $invDesc->invoice_id = $invoice->id;  // USE INVOICE ID
                            $invDesc->hsn_code   = $hsn;
                            $invDesc->descrip    = $request->descp[$index] ?? '';
                            $invDesc->quantity   = $request->quant[$index] ?? 0;
                            $invDesc->unit       = $request->unitRate[$index] ?? 0;
                            $invDesc->total_tax  = $request->totalTax[$index] ?? 0;
                            $invDesc->gst_eighteen = $request->gst_18[$index] ?? 0;
                            $invDesc->total      = $request->totalAmount[$index] ?? 0;
                            $invDesc->save();
                    }
                    // dd($request->all());

                    return redirect('sale')->with('success', 'Invoice bill added successfully');
                }
       
         

        public function getCompany($id)
        {
            $company = Company::find($id);

            if ($company) {
                return response()->json([
                    'status' => true,
                    'data' => $company
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Company not found'
            ]);
        }

        public function store_update_invoice(Request $request,$id){
            //   dd($request->all());
                    // $company_id = $request->company;
                   
                    $invoice = Invoice::find($id);
                    $invoice->invoice_number = $request->invoice_no;
                    $invoice->invoice_date   = $request->invoice_date;
                    $invoice->po_no = $request->po_no ?? null;
                    $invoice->po_date = $request->po_date ?? null;
                    $invoice->company_id     = $request->company;
                    $invoice->total_price =  $request->totalTaxable;
                    $invoice->igst =  $request->igst;
                    $invoice->cgst =  $request->cgst; 
                    $invoice->sgst =  $request->sgst;
                      $invoice->cin =  $request->cin_no ?? null;
                      $invoice->e_way =  $request->e_way ?? null;
                      $invoice->transport =  $request->transport ?? null;
                      $invoice->vehicle_no =  $request->vehicle_no ?? null;
                      $invoice->lr_no =  $request->lr_no ?? null;

                    $invoice->total_amount =   $request->totalAmt;
                    $invoice->payment_method = '1';
                    $invoice->payment        = '1';
                    $invoice->status         = '1';
                    $invoice->totalAmountWords  = $request->totalAmountWords;
                    $invoice->save();
                    
                    // dd($invoice->save());
                         // Loop through invoice description rows
                
                    foreach ($request->hsnCode as $index => $hsn) {
                          $itemDesc = $request->item_id[$index] ?? null;
                          
                          if ($itemDesc) {
                                // Update existing item
                                $invDesc = InvoiceDescr::find($itemDesc);
                                   $invDesc->invoice_id = $invoice->id;
                                  $invDesc->hsn_code     = $hsn;
                                    $invDesc->descrip      = $request->descp[$index] ?? '';
                                    $invDesc->quantity     = $request->quant[$index] ?? 0;
                                    $invDesc->unit         = $request->unitRate[$index] ?? 0;
                                    $invDesc->total_tax    = $request->totalTax[$index] ?? 0;
                                    $invDesc->gst_eighteen = $request->gst_18[$index] ?? 0;
                                    $invDesc->total        = $request->totalAmount[$index] ?? 0;

                                    $invDesc->save();
                            } else {
                                // Create new item
                                $invDesc = new InvoiceDescr();
                                $invDesc->invoice_id = $invoice->id;
                                 $invDesc->hsn_code     = $hsn;
                                $invDesc->descrip      = $request->descp[$index] ?? '';
                                $invDesc->quantity     = $request->quant[$index] ?? 0;
                                $invDesc->unit         = $request->unitRate[$index] ?? 0;
                                $invDesc->total_tax    = $request->totalTax[$index] ?? 0;
                                $invDesc->gst_eighteen = $request->gst_18[$index] ?? 0;
                                $invDesc->total        = $request->totalAmount[$index] ?? 0;
                                 $invDesc->save();
                            }



                            // Fill data
                      
                    }
                   
                    return redirect('sale')->with('success', 'Invoice bill updated successfully');

        }

        public function update_status(Request $request, $id)
            {
                $invoice = Invoice::findOrFail($id);
                $invoice->status = $request->status;
                $invoice->save();

                return redirect()->back()->with('success', 'Status updated successfully!');
            }

            public function update_payment(Request $request, $id)
            {
                $invoice = Invoice::findOrFail($id);
                $invoice->payment = $request->payment;
                $invoice->save();

                return redirect()->back()->with('success', 'Payment detail updated successfully!');
            }




}
