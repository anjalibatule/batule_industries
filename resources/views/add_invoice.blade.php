@extends("layouts.landing")
@section('title','Invoice Add Page')
@section('active-sale','active')
@section('content')
   <a href="{{route('sale')}}" class="btn btn-primary text-light" style="border-radius:50%;"><i class="fas fa-arrow-left"></i> </a>
   <div class="row mt-2">
        <div class="col-12">
             <h2 class="text-primary">Add Invoice Bill</h2>
        </div>
    </div>
    <div class="row">
           
                    
                    <div class="col-4 mt-2">
                         <form action="#" class="form" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="invoice_no" class="form-label">Invoice Number:</label><br>
                        <input type="number" id="invoice_no" class="form-control {{$errors->first('invoice_no')?'input-error':''}}"  value="{{old('invoice_no',$invoice_number)}}" name="invoice_no" readonly>
                        <div class="col-4"> 
                            <span class="text-danger">
                                @error('invoice_no')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                   </div>
                    <div class="col-4 mt-2">
                        <label for="invoice_date" class="form-label">Invoice Date:</label><br>
                        <input type="date" id="invoice_date" class="form-control {{$errors->first('invoice_date')?'input-error':''}}" value="{{old('invoice_date', date('Y-m-d'))}}"  name="invoice_date" required>
                  
                        <div class="col-12"> 
                            <span class="text-danger">
                                @error('invoice_date')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <label for="company" class="form-label">Company:</label><br>
                        <select name="company" id="company" class="w-75 p-2" style="outline:none;border-radius:10px;">
                            @foreach($Compy as $com)
                            <option value="{{ $com->id }}"  {{ old('company') == $com->id ? 'selected' : '' }} name="company" class="w-50">{{$com->company_name}}</option>
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
                    <div class="col-12">
                        <hr>
                    </div>
                    <h5 class="text-primary">Add Company</h5>
                    <div class="col-4 mt-2">
                        <label for="companyName" class="form-label">Company Name:</label><br>
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
                        <label for="companyEmail" class="form-label">Company Email Id:</label><br>
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
                        <label for="mob" class="form-label">Company Mobile Number:</label><br>
                        <input type="tel" id="mob" class="form-control{{$errors->first('mob')?'input-error':''}}"  value="{{old('mob','+91-')}}" placeholder="Enter Company Mobile Number" name="mob" pattern="^\+91-[6-9][0-9]{9}$">
                    
                        <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('mob')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <label for="companyAddress" class="form-label">Company Address:</label><br>
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
                         <label for="gstNo" class="form-label">GST Number:</label><br>
                        <input type="text" id="gstNo" class="form-control{{$errors->first('gstNo')?'input-error':''}}"  value="{{old('gstNo')}}" placeholder="Enter Company GST Number" name="gstNo" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" maxlenth="15">
                
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
                    <div class="col-4 mt-2">
                        <label for="status" class="form-label">Status:</label><br>

                         <input type="radio" name="status" id="active" value="1" {{ old('status') === '1' ? 'checked' : '' }}>
                         <label for="active">Active</label>

                         <input type="radio" name="status" id="inactive" value="0" {{ old('status') === '0' ? 'checked' : '' }} style="margin-left:2%">
                         <label for="inactive">Inactive</label>
                         <div class="col-12 mt-1">
                            <span class="text-danger">
                                @error('status')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>

    </div>
<!-- Invoice Items Section -->
<div id="invoice-items">
    <div class="row item-row">
        <div class="col-4">
            <label class="form-label">HSN Code:</label><br>
            <input type="text" class="form-control" name="hsnCode[]" placeholder="Enter HSN Code" required>
        </div>
        <div class="col-4">
            <label class="form-label">Description:</label><br>
            <textarea class="form-control" name="descp[]" placeholder="Enter Description" required></textarea>
        </div>
        <div class="col-4">
            <label class="form-label">Quantity:</label><br>
            <input type="number" class="form-control" name="quant[]" value="1" required>
        </div>
        <div class="col-4">
            <label class="form-label">Unit Rate:</label><br>
            <input type="number" step="0.01" class="form-control" name="unitRate[]" value="100.00" required>
        </div>
           <div class="col-2 d-flex align-items-end">
            <button type="button" class="btn btn-danger remove-item">Remove</button>
        </div>
    </div>
</div>

<!-- Add Button -->
<div class="col-4 mt-3">
    <button type="button" class="btn btn-primary mt-3" style="width:20%;" id="add-item"> Add <i class="fas fa-plus"></i> </button>
</div>
      
    <hr>
    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary ">Add Invoice</button>
                        <a href="{{route('sale')}}" class="btn btn-primary btn1" style="background:red !important;margin-left:0% !important;">Cancel</a>

             </form>      
     
    </div>
        <script>
                document.addEventListener('DOMContentLoaded', function () {
                    let addButton = document.getElementById('add-item');
                    let container = document.getElementById('invoice-items');

                    // Add new row
                    addButton.addEventListener('click', function () {
                        let firstRow = container.querySelector('.item-row');
                        if (!firstRow) return;

                        let newRow = firstRow.cloneNode(true);

                        // Clear values
                        newRow.querySelectorAll('input, textarea').forEach(field => field.value = '');

                        container.appendChild(newRow);
                    });

                    // Remove row (event delegation)
                    container.addEventListener('click', function (e) {
                        if (e.target.classList.contains('remove-item')) {
                            if (container.querySelectorAll('.item-row').length > 1) {
                                e.target.closest('.item-row').remove();
                            } else {
                                alert('At least one row is required.');
                            }
                        }
                    });
                });
        </script>
 
@endsection