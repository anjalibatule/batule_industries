@extends("layouts.landing")
@section('title','Add User')
@section('active-user','active')
@section('content')

<a href="{{route('user')}}" class="btn btn-primary text-light" style="border-radius:50%;"><i class="fas fa-arrow-left"></i> </a>
      <div class="row mt-2">
        <div class="col-12">
             <h2 class="text-primary">Add Users</h2>
             
        </div>
      </div>
        <hr>
       <div class="row">
             <div class="col-6 mt-2">
                         <form action="{{route('store_user')}}" class="form" method="post" enctype="multipart/form-data">
                         @csrf
                  
                        <label for="user_name" class="form-label">Full Name:</label><br>
                        <input type="text" id="user_name" class="form-control {{$errors->first('user_name')?'input-error':''}}"  value="{{old('user_name')}}" placeholder="Enter Your Full Name" name="user_name" required>
                   
                     <div class="col-12"> 
                         <span class="text-danger">
                            @error('user_name')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
             </div>
               
                    <div class="col-6 mt-1">
                         <label for="email" class="form-label">Email Id:</label><br>
                        <input type="email" id="name" class="form-control {{$errors->first('email')?'input-error':''}}"  value="{{old('email')}}" placeholder="Enter Your Email Id" name="email" required>
                        
                        <div class="col-12 mt-1">
                              <span class="text-danger">
                                 @error('email')
                                 {{$message}}
                                 @enderror
                              </span>
                        </div>
                    </div>
                    <div class="col-6 mt-1">
                          <label for="password" class="form-label">Password:</label><br>
                        <input type="password" id="password" class="form-control{{$errors->first('password')?'input-error':''}}"  value="{{old('password')}}" placeholder="Enter a Strong Password" minlength="8" name="password" required>
                    
                        <div class="col-12 mt-1">
                              <span class="text-danger">
                                 @error('password')
                                 {{$message}}
                                 @enderror
                              </span>
                        </div>
                     </div>
                    <div class="col-6 mt-1">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label><br>
                        <input type="password" id="password_confirmation" class="form-control{{$errors->first('password')?'input-error':''}}"  value="{{old('password')}}" placeholder="Please Enter Password Again " minlength="8" name="password_confirmation" required>
                   
                        <div class="col-12 mt-1">
                              <span class="text-danger">
                                 @error('password')
                                 {{$message}}
                                 @enderror
                              </span>
                        </div>
                     </div>
                    <div class="col-6 mt-1">
                         <label for="mob" class="form-label">Mobile Number:</label><br>
                        <input type="tel" id="mob" class="form-control{{$errors->first('mob')?'input-error':''}}"  value="{{old('mob')}}" placeholder="Enter Your Mobile Number" name="mob" pattern="6{1}[0-9]{9}|7{1}[0-9]{9}|8{1}[0-9]{9}|9{1}[0-9]{9}" required>
                   
                           <div class="col-12 mt-1">
                                 <span class="text-danger">
                                    @error('mob')
                                    {{$message}}
                                    @enderror
                                 </span>
                           </div>
                     </div>
                     <div class="col-6 mt-1">
                        <label for="role" class="form-label">Role:</label><br>
                        <select name="role" id="role" class="w-100 p-1 form-control" required>
                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="User" {{ old('role') == 'User' ? 'selected' : '' }}>User</option>
                        </select>
                   
                        <div class="col-12 mt-1">
                              <span class="text-danger">
                                 @error('role')
                                 {{$message}}
                                 @enderror
                              </span>
                        </div>
                    </div>
                     <div class="col-6 mt-1">
                        <label for="img" class="form-label">User Image:</label><br>
                        <input type="file" id="img" class="form-control{{$errors->first('img')?'input-error':''}}" name="img">
                        
                        
                        <div class="col-12 mt-1">
                              <span class="text-danger">
                                 @error('img')
                                 {{$message}}
                                 @enderror
                              </span>
                        </div>
                     </div>
                  
                      <hr class="mt-2">
                  
                    
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary ">Add</button>
                        <a href="{{route('user')}}" class="btn btn-primary btn1" style="background:red !important;margin-left:0% !important;">Cancel</a>

                    </div>
                   
                </form>
            
       
              
       </div>
@endsection