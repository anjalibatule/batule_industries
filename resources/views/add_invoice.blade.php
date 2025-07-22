@extends("layouts.landing")
@section('title','Invoice Add Page')
@section('active-sale','active')
@section('content')
   <a href="{{route('sale')}}" class="btn btn-primary text-light" style="border-radius:50%;"><i class="fas fa-arrow-left"></i> </a>
     <div class="container-fluid mt-3">
         <form action="{{route('store_invoice')}}" class="form" method="post" enctype="multipart/form-data">
         @csrf

        <table class="table table-bordered">
           
            <tr >
                <td colspan="5" rowspan="4">
                    <h6>To :</h6> 
                    <div class="row" id="companyDetails">
                       
                        <div class="col-6 mt-1">
                        
                        <select name="company" id="company" class="w-75 p-2" style="outline:none;border-radius:10px;">
                            <option class="w-50" value="0" name="company">Select Company</option>
                            @foreach($Company as $com)
                            <option value="{{ $com->id }}"  {{ old('company') == $com->id ? 'selected' : '' }} name="company" class="w-50" >{{$com->company_name}}</option>
                            @endforeach
        
                        </select>
                
        
                        <div class="col-12"> 
                            <span class="text-danger">
                                @error('company')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row col-12 mt-3" id="companyDetailsShow" style="display:none">
                     <p><b>Company Name :</b>
                        <span id="showCompanyName"></span>
                     </p><br>
                     <p><b>Email Id :</b>
                        <span id="showCompanyEmail"></span>
                     </p><br>
                     <p><b>Mobile Number :</b>
                        <span id="showCompanyMobile"></span>
                     </p><br>
                     <p><b>Address :</b>
                        <span id="showCompanyAddress"></span>
                     </p><br>
                     <p><b>State :</b>
                        <span id="showCompanyState"></span>
                     </p><br>
                     <p><b>GST Number:</b>
                        <span id="showCompanyGST" class="gst_number"></span>
                     </p><br>
                </div>
                <div class="row" id="SelectCompany"> 
                    <div class="col-4 mt-2">
                        Company Name:
                        <input type="text" id="companyName" class="form-control {{$errors->first('companyName')?'input-error':''}}"  value="{{old('companyName')}}" placeholder="Enter Company Name" name="companyName">
                    
                        <div class="col-12"> 
                            <span class="text-danger">
                                @error('companyName')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                
                     <div class="col-4 mt-2">
                        <label for="companyEmail" class="form-label">Email Id:</label><br>
                        <input type="email" id="companyEmail" class="form-control {{$errors->first('companyEmail')?'input-error':''}}"  value="{{old('companyEmail')}}" placeholder="Enter Company Email Id" name="companyEmail" >
                   
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('companyEmail')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <label for="mob" class="form-label">Mobile Number:</label><br>
                        <input type="tel" id="mob" class="form-control{{$errors->first('mob')?'input-error':''}}"  value="{{old('mob','+91-')}}" placeholder="Enter Company Mobile Number" name="mob" >
                    
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('mob')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <label for="companyAddress" class="form-label">Address:</label><br>
                         <textarea name="companyAddress" id="companyAddress" row="5" class="form-control w-100 p-1 {{$errors->first('companyAddress')?'input-error':''}}"  placeholder="Enter Company Address">{{old('companyAddress')}}</textarea>
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('companyAddress')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                     <div class="col-4 mt-2">
                         <label for="state" class="form-label">State :</label><br>
                        
                          <input type="text" id="state" class="form-control{{$errors->first('state')?'input-error':''}}"  value="{{old('state','Maharashtra')}}"  name="state">
                      
                   
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('state')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                    </div>
                    <div class="col-4 mt-2">
                         <label for="gstNo" class="form-label">GST Number:</label><br>
                        <input type="text" id="gstNo" class="form-control{{$errors->first('gstNo')?'input-error':''}}"  value="{{old('gstNo',27)}}" placeholder="Enter Company GST Number" name="gstNo">
                
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('gstNo')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                         <label for="date" class="form-label">Date:</label><br>
                        <input type="date" id="date" class="form-control"  value="{{old('date', date('Y-m-d'))}}"  name="date">
                
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('date')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>

                    </div>

                </td>
                <td colspan="4" rowspan="4">

                        Invoice Number:
                       <input type="number" id="invoice_no" class="form-control {{$errors->first('invoice_no')?'input-error':''}}"  value="{{old('invoice_no',$invoice_number)}}" name="invoice_no" readonly>
                        <div class="col-4"> 
                            <span class="text-danger">
                                @error('invoice_no')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    <label for="invoice_date" class="form-label mt-2">Invoice Date:</label><br>
                        <input type="date" id="invoice_date" class="form-control {{$errors->first('invoice_date')?'input-error':''}}" value="{{old('invoice_date', date('Y-m-d'))}}"  name="invoice_date" required>
                       Purchase Order Number:
                       <input type="number" id="po_no" class="form-control {{$errors->first('po_no')?'input-error':''}}"  value="{{old('po_no')}}" name="po_no">
                        <div class="col-4"> 
                            <span class="text-danger">
                                @error('po_no')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        Purchase Order Date:
                       <input type="date" id="po_date" class="form-control {{$errors->first('po_date')?'input-error':''}}"  value="{{old('po_date')}}" name="po_date">
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
            <!-- table head -->
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
                <tr class="item-row">

                    <td>1</td>
                    <td><textarea class="form-control descp" name="descp[]" required></textarea></td>
                    <td><input type="text" class="form-control hsnCode" name="hsnCode[]" required></td>
                    <td><input type="number" class="form-control quant" value="1" name="quant[]" required></td>
                    <td><input type="number" step="0.01" class="form-control unitRate" value="100.00" name="unitRate[]" required></td>
                    <td><input type="number" step="0.01" class="form-control totalTax" value="100.00" name="totalTax[]"  required></td>
                    <td><input type="number" step="0.01" class="form-control gst_18" value="18.00"  name="gst_18[]" required></td>
                    <td><input type="number" step="0.01" class="form-control totalAmount" value="118.00" name="totalAmount[]" required></td>
                    <td><button type="button" class="btn btn-danger remove-item">Remove</button></td>
                </tr>
            </tbody>
             
            <tr>
                <td colspan="8"> </td>
                <!-- Add Button -->
                 <td>
               
                    <button type="button" class="btn btn-primary mt-3" id="add-item"> Add <i class="fas fa-plus"></i> </button>
                
               </td>
            </tr>
            <tr>
                <td colspan="6" >
                    Total Amount:
                    <input type="text"  class="form-control totalAmountWords" value="Only." name="totalAmountWords" id="totalAmountWords" required style="display:inline-block !important;width:86% !important;">
                </td>
                
                <td colspan="3">
                     Total Tax:
                    <input type="text"  class="form-control totalTaxable" name="totalTaxable"  required style="display:inline-block !important;width:60% !important;">
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
                    <input type="text"  class="form-control igst" name="igst"  required style="display:inline-block !important;width:60% !important;">
               </td>
            </tr>
            <tr>
                <td colspan="3">
                     CGST:
                    <input type="text"  class="form-control cgst" name="cgst"  required style="display:inline-block !important;width:60% !important;">
                </td>
            </tr>
            <tr>
                 <td colspan="3">
                     SGST:
                    <input type="text"  class="form-control sgst" name="sgst"  required style="display:inline-block !important;width:60% !important;">
                 </td>
            </tr>
            <tr>
                  <td colspan="3" rowspan="2">
                     Total Amount:
                    <input type="text"  class="form-control totalAmt" name="totalAmt"  required style="display:inline-block !important;width:60% !important;">
                  </td>
            </tr>
            <tr>
               
            </tr>
       
       

       
       
        </table>
           
          <div class="col-6 mt-2" style="margin-left:40%;">
                        <button type="submit" class="btn btn-primary ">Add Invoice</button>
                     
     
                        <a href="{{route('sale')}}" class="btn btn-primary btn1" style="background:red !important;margin-left:0% !important;">Cancel</a>  
         </div>
    </form>     
        
</div> 
@endsection



<!-- pattern="^\+91-[6-9][0-9]{9}$" -->
 <!-- pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" -->