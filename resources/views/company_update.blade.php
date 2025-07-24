
@extends("layouts.landing")
@section('title','Update Company Details')
@section('active-company','active')
@section('content')
<a href="{{route('company')}}" class="btn btn-primary text-light" style="border-radius:50%;"><i class="fas fa-arrow-left"></i> </a>
<div class="row mt-2">
       
        <div class="col">
             <h2 class="text-primary">Update Company Details</h2>
        </div>
        <div class="col">
                      
        </div>
        
</div>
      <div class="row">
                      <hr>
                    
                    <div class="col-6 mt-2">
                       <form action="{{route('update_company_details',$company->id)}}" class="form" method="post" enctype="multipart/form-data">
                       @csrf
                        <label for="companyName" class="form-label">Company Name:</label><br>
                        <input type="text" id="companyName" class="form-control {{$errors->first('companyName')?'input-error':''}}"  value="{{old('companyName',$company->company_name)}}" placeholder="Enter Company Name" name="companyName" required>
                    
                         <div class="col-12"> 
                              <span class="text-danger">
                              @error('companyName')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                    </div>
                     <div class="col-6 mt-2">
                         <label for="ownerName" class="form-label">Owner Name:</label><br>
                        <input type="text" id="ownerName" class="form-control {{$errors->first('ownerName')?'input-error':''}}"  value="{{old('ownerName',$company->owner_name)}}" placeholder="Enter Company Owner Name" name="ownerName" required>
                   
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('ownerName')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                    </div>
                    <div class="col-6 mt-2">
                         <label for="companyEmail" class="form-label">Company Email Id:</label><br>
                        <input type="email" id="companyEmail" class="form-control {{$errors->first('companyEmail')?'input-error':''}}"  value="{{old('companyEmail',$company->company_email)}}" placeholder="Enter Company Email Id" name="companyEmail" required>
                   
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('companyEmail')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                    </div>
                    <div class="col-6 mt-2">
                         <label for="mob" class="form-label">Company Mobile Number:</label><br>
                        <input type="tel" id="mob" class="form-control{{$errors->first('mob')?'input-error':''}}"  value="{{old('mob',$company->company_mobile)}}" placeholder="Enter Company Mobile Number" name="mob" pattern="^\+91-[6-9][0-9]{9}$" required>
                   
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('mob')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                    </div>
                     <div class="col-6 mt-2">
                         <label for="companyAddress" class="form-label">Company Address:</label><br>
                         <textarea name="companyAddress" id="companyAddress" row="5" class="form-control w-100 p-1 {{$errors->first('companyAddress')?'input-error':''}}"  placeholder="Enter Company Address">{{old('companyAddress',$company->company_address)}}</textarea>
                      
                    
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('companyAddress')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                   </div>
                    <div class="col-6 mt-2">
                         <label for="state" class="form-label">State:</label><br>
                         <textarea name="state" id="state" row="5" class="form-control w-100 p-1 {{$errors->first('state')?'input-error':''}}" >{{old('companyAddress',$company->state)}}</textarea>
                      
                    
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('state')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                   </div>
                     <div class="col-6 mt-2">
                         <label for="gstNo" class="form-label">GST Number:</label><br>
                        <input type="text" id="gstNo" class="form-control{{$errors->first('gstNo')?'input-error':''}}"  value="{{old('gstNo',$company->gst_no)}}" name="gstNo" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[0-9A-Z]{4}$" maxlenth="15" required>
                   
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('gstNo')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                     </div> 
                     <div class="col-6 mt-2">
                         <label for="date" class="form-label">Date:</label><br>
                        <input type="date" id="date" class="form-control" name="date" value="{{old('date',$company->date)}}" readonly>
                  
                         <div class="col-12 mt-1">
                              <span class="text-danger">
                              @error('date')
                              {{$message}}
                              @enderror
                              </span>
                         </div>
                   </div>
                    <div class="col-6 mt-2">
                         <label for="status" class="form-label">Status:</label><br>

                         <input type="radio" name="status" id="active" value="1" {{ $company->status == 1 ? 'checked' : '' }}>
                         <label for="active">Active</label>

                         <input type="radio" name="status" id="inactive" value="0" {{ $company->status == 0 ? 'checked' : '' }} style="margin-left:2%">
                         <label for="inactive">Inactive</label>
                        

                         <div class="col-12 mt-1">
                         <span class="text-danger">
                              @error('status')
                                   {{ $message }}
                              @enderror
                         </span>
                         </div>

                    </div>
                   
                      <hr class="mt-2">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary ">Update</button>
                        <a href="{{route('company')}}" class="btn btn-primary btn1" style="background:red !important;margin-left:0% !important;">Cancel</a>

                    </div>
    </div>
                 
  
@endsection