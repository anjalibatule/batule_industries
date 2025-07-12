<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Batule Industries - Login Page</title>

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
        input[type="checkbox"]{
            padding:20px;
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
            <div class="col-md-3" style="margin:0 auto">

                <form action="{{route('custom_login')}}" class="form card" method="post">
                    @csrf
                    <h3 class="text-primary text-center mt-3">Login Page</h3>
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
                          <input type="password" id="password" class="form-control{{$errors->first('pwd')?'input-error':''}}"  value="{{old('password')}}" placeholder="Enter a Strong Password" minlength="8" name="password" required>
                         <input type="checkbox"  class="mt-3"  onclick="togglePassword()"><span style="margin-left:10px">Show Password</span>
                    </div>
                    
                    <div class="col-12 mt-1">
                         <span class="text-danger">
                            @error('pwd')
                            {{$message}}
                            @enderror
                         </span>
                    </div>
                    <div class="col-12 mt-2">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                    <div class="col-12 mt-2">  
                        <p>Not have an account? <a href="{{route('register')}}" class="text-decoration-none mt-2 mb-5" style="margin-left:5px;">Sign Up Here</a></p>  
                    </div>
                  
                </form>
            </div>
           </div>
       </div>
        
       <script>
        function togglePassword(){
            console.log("abc");
          const pass = document.getElementById('password');
           if(pass.type === "password"){
             pass.type = "text";
           }
           else{
              pass.type = "password";
           }
        }
           
       </script>

</body>
</html>