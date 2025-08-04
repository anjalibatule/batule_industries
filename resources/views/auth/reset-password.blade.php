<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Batule Industries - Forgot Password Page</title>

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

              <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <label>Email:</label>
                    <input type="email" name="email" required class="form-control">

                    <label>New Password:</label>
                    <input type="password" name="password" required class="form-control">

                    <label>Confirm Password:</label>
                    <input type="password" name="password_confirmation" required class="form-control">

                    <button type="submit" class="btn btn-success mt-2">Reset Password</button>
                </form>
            </div>
           </div>
       </div>
        
</body>
</html>