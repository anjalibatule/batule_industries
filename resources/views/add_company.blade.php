
@extends("layouts.landing")
@section('title','Add Company Details')
@section('active-company','active')
@section('content')

<a href="{{route('company')}}" class="btn btn-primary text-light" style="border-radius:50%;"><i class="fas fa-arrow-left"></i> </a>
<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-12">
             <h2 class="text-primary">Add Company Details</h2>
        </div>
    </div>
     <div class="row">
        <div class="col-12">
            <form action="{{route('store_company_details')}}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6">
                      <hr>
                    </div>
                    <div class="col-6 mt-2">
                        <label for="companyName" class="form-label">Company Name:</label><br>
                        <input type="text" id="companyName" class="form-control {{$errors->first('companyName')?'input-error':''}}"  value="{{old('companyName')}}" placeholder="Enter Company Name" name="companyName" required>
                     </div>
                     <div class="col-12"> 
                         <span class="text-danger">
                            @error('companyName')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-6 mt-2">
                         <label for="companyEmail" class="form-label">Company Email Id:</label><br>
                        <input type="email" id="companyEmail" class="form-control {{$errors->first('companyEmail')?'input-error':''}}"  value="{{old('companyEmail')}}" placeholder="Enter Company Email Id" name="companyEmail" required>
                    </div>
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('companyEmail')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-6 mt-2">
                         <label for="mob" class="form-label">Company Mobile Number:</label><br>
                        <input type="tel" id="mob" class="form-control{{$errors->first('mob')?'input-error':''}}"  value="{{old('mob','+91-')}}" placeholder="Enter Company Mobile Number" name="mob" pattern="^\+91-[6-9][0-9]{9}$" required>
                    </div> 
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('mob')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                     <div class="col-12 mt-2">
                         <label for="companyAddress" class="form-label">Company Address:</label><br>
                         <textarea name="companyAddress" id="companyAddress" row="5" class="form-control w-50 p-1 {{$errors->first('companyAddress')?'input-error':''}}"  placeholder="Enter Company Address">{{old('companyAddress')}}</textarea>
                      
                    </div> 
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('companyAddress')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                     <div class="col-6 mt-2">
                         <label for="gstNo" class="form-label">GST Number:</label><br>
                        <input type="text" id="gstNo" class="form-control{{$errors->first('gstNo')?'input-error':''}}"  value="{{old('gstNo')}}" placeholder="Enter Company GST Number" name="gstNo" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" maxlenth="15" required>
                    </div> 
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('gstNo')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                     <div class="col-6 mt-2">
                         <label for="date" class="form-label">Date:</label><br>
                        <input type="date" id="date" class="form-control"  value="{{old('date', date('Y-m-d'))}}"  name="date">
                    </div> 
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('date')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-6 mt-2">
                         <label for="status" class="form-label">Status:</label><br>

                         <input type="radio" name="status" id="active" value="1" {{ old('status') === '1' ? 'checked' : '' }}>
                         <label for="active">Active</label>

                         <input type="radio" name="status" id="inactive" value="0" {{ old('status') === '0' ? 'checked' : '' }} style="margin-left:2%">
                         <label for="inactive">Inactive</label>
                         </div>

                         <div class="col-12 mt-1">
                         <span class="text-danger">
                              @error('status')
                                   {{ $message }}
                              @enderror
                         </span>
                         </div>

                    
                    <div class="col-6">
                      <hr>
                    </div>
                    
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary ">Add</button>
                        <a href="{{route('company')}}" class="btn btn-primary btn1" style="background:red !important;margin-left:0% !important;">Cancel</a>

                    </div>
        </div>
    </div>
</div>
                 
  
@endsection