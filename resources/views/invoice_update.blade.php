@extends("layouts.landing")
@section('title','Invoice Update Page')
@section('active-sale','active')
@section('content')
     <a href="{{route('sale')}}" class="btn btn-primary text-light" style="border-radius:50%;"><i class="fas fa-arrow-left"></i> </a>

     <div class="container-fluid mt-3">
        
         <form action="{{route('store_update_invoice',$invoices->id)}}" class="form" method="post" enctype="multipart/form-data">

            @method('PUT')
         @csrf

        <table class="table table-bordered">
           
            <tr >
                <td colspan="5" rowspan="4">
                    <h6>To :</h6> 
                <div class="row col-12" id="SelectCompany" style="margin-left:1%;"> 
                    <div>
                         <select name="company" id="companySelect" class="w-75 p-2 mb-3" style="outline:none;border-radius:10px;">
                            <option value="0">Select Company</option>
                            @foreach($companies as $com)
                                <option value="{{ $com->id }}" {{ old('company', $invoices->company_id) == $com->id ? 'selected' : '' }}>
                                    {{ $com->company_name }}
                                </option>
                            @endforeach
        
                        </select>
                    </div>
                         
                    
                        Company Name:
                        <input type="text" id="companyName" class="form-control mt-2  {{$errors->first('companyName')?'input-error':''}}"  value="{{old('companyName',$invoices->company->company_name)}}" placeholder="Enter Company Name" name="companyName"  style="display:inline-block !important;width:40% !important;margin-left:1%;">
                    
                        <div class="col-12"> 
                            <span class="text-danger">
                                @error('companyName')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                  
                        Email Id:
                        <input type="email" id="companyEmail" class="form-control mt-1 {{$errors->first('companyEmail')?'input-error':''}}"  value="{{old('companyEmail',$invoices->company->company_email)}}" placeholder="Enter Company Email Id" name="companyEmail"  style="display:inline-block !important;width:40% !important;margin-left:6%;">
                   
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('companyEmail')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    
                       Mobile Number:
                        <input type="tel" id="mob" class="form-control mt-1 {{$errors->first('mob')?'input-error':''}}"  value="{{old('mob',$invoices->company->company_mobile)}}" placeholder="Enter Company Mobile Number" name="mob"  style="display:inline-block !important;width:40% !important;margin-left:1%;">
                    
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('mob')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    
                       Address:
                         <textarea name="companyAddress" id="companyAddress" row="5" class="form-control mt-1 w-100 p-1 {{$errors->first('companyAddress')?'input-error':''}}"  placeholder="Enter Company Address" style="display:inline-block !important;width:40% !important;margin-left:6%;">{{old('companyAddress',$invoices->company->company_address)}}</textarea>
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('companyAddress')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                   
                        State :
                        
                          <input type="text" id="state" class="form-control mt-1 {{$errors->first('state')?'input-error':''}}"  value="{{old('state',$invoices->company->state)}}"  name="state" style="display:inline-block !important;width:40% !important;margin-left:8%;">
                      
                   
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('state')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                   
                        GST Number:
                        <input type="text" id="gstNo" class="form-control mt-1 {{$errors->first('gstNo')?'input-error':''}}"  value="{{old('gstNo',$invoices->company->gst_no)}}" placeholder="Enter Company GST Number" name="gstNo" style="display:inline-block !important;width:40% !important;margin-left:3%;">
                
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('gstNo')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    

                    </div>

                </td>
                <td colspan="4" rowspan="4">

                        Invoice Number:
                       <input type="number" id="invoice_no" class="form-control {{$errors->first('invoice_no')?'input-error':''}}"  value="{{old('invoice_no',$invoices->invoice_number)}}" name="invoice_no" readonly>
                        <div class="col-4"> 
                            <span class="text-danger">
                                @error('invoice_no')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    <label for="invoice_date" class="form-label mt-2">Invoice Date:</label><br>
                        <input type="date" id="invoice_date" class="form-control {{$errors->first('invoice_date')?'input-error':''}}" value="{{old('invoice_date', $invoices->invoice_date)}}"  name="invoice_date" required>
                       Purchase Order Number:
                       <input type="number" id="po_no" class="form-control {{$errors->first('po_no')?'input-error':''}}"  value="{{old('po_no',$invoices->po_no)}}" name="po_no">
                        <div class="col-4"> 
                            <span class="text-danger">
                                @error('po_no')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        Purchase Order Date:
                       <input type="date" id="po_date" class="form-control {{$errors->first('po_date')?'input-error':''}}"  value="{{old('po_date',$invoices->po_date)}}" name="po_date">
                        <div class="col-4"> 
                            <span class="text-danger">
                                @error('po_date')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                </td>
               
            </tr>
            <tr>
               
                
            </tr>
            <tr>
               
            </tr>
             <tr>
               
            </tr> 

            <!-- description code -->
             <tr>
                <td>SR. No.</td>
                <td>Description</td>
                <td>HSN Code</td>
                <td>Quantity</td>
                <td>Unit Rate</td>
                <td>Total Tax</td>
                <td>@GST_18%</td>
                <td>Total Amount</td>
                <td></td>

            </tr>
           
             <tbody id="invoice-items">
                 @foreach($invoices->invoice_desc as $index => $invDesc)
                <tr class="item-row">
                    <td>$index+1</td>
                    <input type="hidden" name="item_id[]" value="{{$invDesc->id}}">
                    <td><textarea class="form-control descp" name="descp[]" required>{{$invDesc->descrip}}</textarea></td>
                     <td><input type="text" class="form-control hsnCode" name="hsnCode[]" required value="{{$invDesc->hsn_code}}"></td>
                    <td><input type="number" class="form-control quant" value="{{$invDesc->quantity}}" name="quant[]" required></td>
                    <td><input type="number" step="0.01" class="form-control unitRate" value="{{$invDesc->unit}}" name="unitRate[]" required></td>
                    <td><input type="number" step="0.01" class="form-control totalTax" value="{{$invDesc->total_tax}}" name="totalTax[]"  required></td>
                    <td><input type="number" step="0.01" class="form-control gst_18" value="{{$invDesc->gst_eighteen}}"  name="gst_18[]" required></td>
                    <td><input type="number" step="0.01" class="form-control totalAmount" value="{{$invDesc->total}}" name="totalAmount[]" required></td> 
                    <td><button type="button" class="btn btn-danger remove-item">Remove</button></td>
                </tr>
                   @endforeach
            </tbody>
           
            <tr>
                <td colspan="8"> </td>
                <!-- Add Button -->
                 <td>
               
                    <button type="button" class="btn btn-primary mt-3" id="update-item"> Add <i class="fas fa-plus"></i> </button>
                
               </td>
            </tr>
            <tr>
                <td colspan="6" >
                    Total Amount:
                    <input type="text"  class="form-control totalAmountWords" value="{{old('totalAmountWords',$invoices->totalAmountWords)}}" name="totalAmountWords" id="totalAmountWords" required style="display:inline-block !important;width:86% !important;">
                </td>
                
                <td colspan="3">
                     Total Tax:
                    <input type="text"  class="form-control totalTaxable" name="totalTaxable"  value="{{old('totalTaxable',$invoices->total_price)}}"  required style="display:inline-block !important;width:60% !important;">
                </td>
                
            </tr>
            <tr>
                 <td colspan="6" rowspan="5">
                    <h6>From :</h6>
                        <b class="mt-1">Company Name :</b>
                        <span>{{$contact->contact_company_name}}</span>
                     <br>
                     <b class="mt-1">Email Id :</b>
                        <span>{{$contact->contact_email}}</span>
                     <br>
                     <b class="mt-1">Mobile Number :</b>
                        <span>{{$contact->contact_number}}</span>
                     <br>
                    <b class="mt-1">Address :</b>
                        <span>{{$contact->contact_address}}</span>
                     <br>
                    <b class="mt-1">GST Number:</b>
                        <span >{{$contact->gst_number}}</span>
                     <br>
                 </td>
               <td colspan="3">
                     IGST:
                    <input type="text"  class="form-control igst" name="igst" value="{{old('igst',$invoices->igst)}}" required style="display:inline-block !important;width:60% !important;">
               </td>
            </tr>
            <tr>
                <td colspan="3">
                     CGST:
                    <input type="text"  class="form-control cgst" name="cgst" value="{{old('cgst',$invoices->cgst)}}" required style="display:inline-block !important;width:60% !important;">
                </td>
            </tr>
            <tr>
                 <td colspan="3">
                     SGST:
                    <input type="text"  class="form-control sgst" value="{{old('sgst',$invoices->sgst)}}" name="sgst"  required style="display:inline-block !important;width:60% !important;">
                 </td>
            </tr>
            <tr>
                  <td colspan="3" rowspan="2">
                     Total Amount:
                    <input type="text"  class="form-control totalAmt" name="totalAmt"  value="{{old('totalAmt',$invoices->total_amount)}}"  required style="display:inline-block !important;width:60% !important;">
                  </td>
            </tr>
            <tr>
            </tr>
       
       

       
       
        </table>
           
          <div class="col-6 mt-2" style="margin-left:40%;">
                        <button type="submit" class="btn btn-primary ">Update</button>
                     
     
                        <a href="{{route('sale')}}" class="btn btn-primary btn1" style="background:red !important;margin-left:0% !important;">Cancel</a>  
         </div>
    
</form>
</div>
@endsection