@extends("layouts.landing")

@section('title', 'Purchase Order Page')
@section('active-purchase', 'active')

@section('content')
<a href="{{ route('purchase_order') }}" class="btn btn-primary text-light" style="border-radius:50%;">
    <i class="fas fa-arrow-left"></i>
</a>

<div class="container-fluid mt-2">
    <form action="{{ route('store_purchase') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <table class="table table-bordered">
            <tr>
                <td colspan="7" rowspan="10">
                    <h6>To :</h6>
                    <div class="row" id="companyDetails">
                        <div class="col-6 mt-1">
                            <select name="company" id="company" class="w-100 p-2 company form-control" style="outline:none;border-radius:10px;" required>
                                <option value="">Select Company</option>
                                @foreach($company as $com)
                                    <option value="{{ $com->id }}" {{ old('company') == $com->id ? 'selected' : '' }}>
                                        {{ $com->company_name }}
                                    </option>
                                @endforeach
                                <option value="0">Other Company</option>
                            </select>

                            <div class="col-12">
                                <span class="text-danger">@error('company') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <!-- Company Details Display -->
                    <div class="row col-12 mt-3" id="companyDetailsShow" style="display:none">
                        <p><b>Company Name :</b> <span id="showCompanyName"></span></p><br>
                        <p><b>Email Id :</b> <span id="showCompanyEmail"></span></p><br>
                        <p><b>Mobile Number :</b> <span id="showCompanyMobile"></span></p><br>
                        <p><b>Address :</b> <span id="showCompanyAddress"></span></p><br>
                        <p><b>GST Number:</b> <span id="showCompanyGST" class="gst_number"></span></p><br>
                    </div>

                    <!-- Other Company Form -->
                    <div class="row" id="SelectCompany" style="display:none">
                        <div class="col-4 mt-2">
                            Company Name:
                            <input type="text" name="companyName" id="companyName"
                                class="form-control {{ $errors->first('companyName') ? 'input-error' : '' }}"
                                value="{{ old('companyName') }}" placeholder="Enter Company Name">
                            <span class="text-danger">@error('companyName') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="ownerName">Owner Name:</label>
                            <input type="text" name="ownerName" id="ownerName"
                                class="form-control {{ $errors->first('ownerName') ? 'input-error' : '' }}"
                                value="{{ old('ownerName') }}" placeholder="Enter Company Owner Name">
                            <span class="text-danger">@error('ownerName') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="companyEmail">Email Id:</label>
                            <input type="email" name="companyEmail" id="companyEmail"
                                class="form-control {{ $errors->first('companyEmail') ? 'input-error' : '' }}"
                                value="{{ old('companyEmail') }}" placeholder="Enter Company Email">
                            <span class="text-danger">@error('companyEmail') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="mob">Mobile Number:</label>
                            <input type="tel" name="mob" id="mob"
                                class="form-control {{ $errors->first('mob') ? 'input-error' : '' }}"
                                value="{{ old('mob', '+91-') }}" placeholder="Enter Company Mobile">
                            <span class="text-danger">@error('mob') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="companyAddress">Address:</label>
                            <textarea name="companyAddress" id="companyAddress"
                                class="form-control w-100 p-1 {{ $errors->first('companyAddress') ? 'input-error' : '' }}"
                                placeholder="Enter Company Address">{{ old('companyAddress') }}</textarea>
                            <span class="text-danger">@error('companyAddress') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="state">State:</label>
                            <input type="text" name="state" id="state"
                                class="form-control {{ $errors->first('state') ? 'input-error' : '' }}"
                                value="{{ old('state', 'Maharashtra') }}">
                            <span class="text-danger">@error('state') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="gstNo">GST Number:</label>
                            <input type="text" name="gstNo" id="gstNo"
                                class="form-control {{ $errors->first('gstNo') ? 'input-error' : '' }}"
                                value="{{ old('gstNo', 27) }}" placeholder="Enter Company GST Number">
                            <span class="text-danger">@error('gstNo') {{ $message }} @enderror</span>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="date">Date:</label>
                            <input type="date" name="date" id="date" class="form-control"
                                value="{{ old('date', date('Y-m-d')) }}">
                            <span class="text-danger">@error('date') {{ $message }} @enderror</span>
                        </div>
                    </div>
                </td>

                <!-- Purchase Order Fields -->
                <td colspan="2" rowspan="4">
                    Purchase Order Number:
                    <input type="text" name="po_no" id="po_no"
                        class="form-control {{ $errors->first('po_no') ? 'input-error' : '' }}"
                        value="{{ old('po_no') }}" required>
                    <span class="text-danger">@error('po_no') {{ $message }} @enderror</span>

                    Purchase Order Date:
                    <input type="date" name="po_date" class="form-control mt-2"
                        value="{{ old('po_date', date('Y-m-d')) }}" required>
                    <span class="text-danger">@error('po_date') {{ $message }} @enderror</span>
                </td>
            </tr>
               <tr>
               
                
            </tr>
            <tr>
               
            </tr>
             <tr>
               
            </tr> 
            
            <tr>
                
                
                <td colspan="2">
                     Total Tax:
                    <input type="number"  class="form-control" id="totalTaxable" name="totalTaxable" value="{{old('totalTaxable',100)}}"   style="display:inline-block !important;width:60% !important;" required>
                </td>
                
            </tr>
            <tr>
             
               <td colspan="2">
                     IGST:
                    <input type="text"  class="form-control" id="igst" name="igst" value="{{old('igst')}}"  style="display:inline-block !important;width:60% !important;" >
               </td>
            </tr>
            <tr>
                
                <td colspan="2">
                     CGST:
                    <input type="text"  class="form-control" id="cgst" name="cgst"  value="{{old('cgst')}}"  style="display:inline-block !important;width:60% !important;">
                </td>
            </tr>
            <tr>
                
                 <td colspan="2">
                     SGST:
                    <input type="text"  class="form-control" id="sgst" name="sgst"  value="{{old('sgst')}}"  style="display:inline-block !important;width:60% !important;">
                 </td>
            </tr>
            <tr>
                
                  <td colspan="2" rowspan="2">
                     Total Amount:
                    <input type="text"  class="form-control" id="totalAmt" name="totalAmt"  value="{{old('totalAmt')}}"   style="display:inline-block !important;width:60% !important;">
                  </td>
            </tr>
            <tr>
               
            </tr>
       
       

       
       
        </table>

        <!-- Buttons -->
        <div class="col-6 mt-2" style="margin-left:40%;">
            <button type="submit" class="btn btn-primary">Add Purchase</button>
            <a href="{{ route('purchase_order') }}" class="btn btn-danger" style="margin-left:5%;">Cancel</a>
        </div>
    </form>
</div>
@endsection
