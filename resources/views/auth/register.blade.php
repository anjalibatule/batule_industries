<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Batule Industries -Sign Up Page</title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="resources/css/landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- jQuery (Google CDN) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <style>
        form{
            box-shadow: 2px 2px 5px rgba(0, 0, 0, .6);
            padding:0 20px;
        }
    </style>
    </head>
<body>
       @if(session()->has('success'))
       <div class="alert alert-success alert-dismissible fade show">{{session('success')}}</div>
       @elseif(session()->has('error'))
       <div class="alert alert-danger alert-dismissible fade show">{{session('error')}}</div>
       @endif

      
       <div class="container mt-5">
           <div class="row">
            <div class="col-4" style="margin:0 auto">
                 <!-- validation -->
                  <!-- @if($errors->any())
                    @foreach($errors->all() as $error)
                     <div class="text-danger">
                        {{$error}}
                     </div>
                     @endforeach
                  @endif -->
                <form action="{{route('store')}}" class="form card" method="post" enctype="multipart/form-data">
                    @csrf
                    <h3 class="text-primary text-center mt-3">Sign Up Page</h3>
                    <div class="col-12 mt-2">
                        <label for="user_name" class="form-label">Full Name:</label><br>
                        <input type="text" id="user_name" class="form-control {{$errors->first('user_name')?'input-error':''}}"  value="{{old('user_name')}}" placeholder="Enter Your Full Name" name="user_name" required>
                     </div>
                     <div class="col-12"> 
                         <span class="text-danger">
                            @error('user_name')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-12 mt-1">
                         <label for="email" class="form-label">Email Id:</label><br>
                        <input type="email" id="name" class="form-control {{$errors->first('email')?'input-error':''}}"  value="{{old('email')}}" placeholder="Enter Your Email Id" name="email" required>
                    </div>
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-12 mt-1">
                          <label for="password" class="form-label">Password:</label><br>
                        <input type="password" id="password" class="form-control{{$errors->first('password')?'input-error':''}}"  value="{{old('password')}}" placeholder="Enter a Strong Password" minlength="8" name="password" required>
                    </div>
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('password')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-12 mt-1">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label><br>
                        <input type="password" id="password_confirmation" class="form-control{{$errors->first('password')?'input-error':''}}"  value="{{old('password')}}" placeholder="Please Enter Password Again " minlength="8" name="password_confirmation" required>
                    </div>
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('password')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-12 mt-1">
                         <label for="mob" class="form-label">Mobile Number:</label><br>
                        <input type="tel" id="mob" class="form-control{{$errors->first('mob')?'input-error':''}}"  value="{{old('mob')}}" placeholder="Enter Your Mobile Number" name="mob" pattern="6{1}[0-9]{9}|7{1}[0-9]{9}|8{1}[0-9]{9}|9{1}[0-9]{9}" required>
                    </div> 
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('mob')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                   
                    <input type="hidden" id="img" name="img"  required>
                   
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary w-100">SIGN UP</button>
                    </div>
                    <div class="col-12 mt-2">  
                         
                        <p>You already have an account?  <a href="{{route('login')}}" class="text-decoration-none mt-2 mb-5" style="margin-left:5px;">Login Here</a></p>
                          
                    </div>
                  
                </form>
            </div>
           </div>
       </div>
</body>
</html>