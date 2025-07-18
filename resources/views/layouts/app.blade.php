<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Batule Industries-@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="resources/css/app.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- jQuery -->


<!-- Bootstrap CSS (should be in <head>) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
     
        .nav-link{
         font-size: 25px;
          cursor:pointer;
        }
      header {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         z-index: 1000; 
         background-color: white; 
     }
      
  footer {
    position: fixed;
    bottom: 0;
    width: 100%;
      background-color: var(--primary);
      color: white;
      text-align: center;
      padding: 15px 0;
      /* z-index: 999; */
  }
    .nav-link.active {
            color:white; /* Bootstrap primary color */
            font-size:25px;
            border-bottom:2px solid white;
            width:95%;
        }

        .nav-link.active:hover,
        .nav-link.active:focus {
            color: #0a58ca;
        }
              /* logoutf form */
        .logoutPage{
           position: fixed;
            top: 7%;
            right: 3%;
            width: 12%;
            height: 30%;
            border-radius: 10px;
            background:white;
            /* box-shadow: 2px 2px 1px rgba(0,0,0,.4); */
            display:none;
        }
        #cancel{
         margin-left: 90%; 
         border-radius: 8px;
         padding: 0px 6px;
         font-size: 18px;
         position: fixed;
         right: 50px;
         top:54px;
         /* border:none; */
        }
         .img1{
        border-radius: 50%;
         width: 40%;
         margin-left: 29%;
         margin-top: 12%;
        }
    </style>
    </head>
<body>
    
   <div>   
       <header >
         
                 <nav class="navbar navbar-expand-lg navbar-light bg-primary justify-between">
                  <!-- <div class="row">
                     <div class="col-6">
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                           <li>
                              <a class="nav-link " href="#" role="button"></a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#" role="button"></a>
                           </li>
                        </ul>
                        </div>
                     </div>
                     <div class="col-6">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                           <li>
                              <a class="nav-link btn1 btn-danger" href="#" role="button">SIGN UP</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link btn1 btn-danger" href="#" role="button">LOGIN</a>
                           </li>
                        </ul>
                     </div>
                     </div>
                  </div>  -->
                  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                           <li>
                              <a class="nav-link w-100 text-light" href="#" style="margin-left:25px" role="button">BATULE INDUSTRIES</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="#" role="button"><img src="" alt=""></a>
                           </li>
                        </ul>
                     </div>
                     
                     
                     <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 50%;">
                          @auth
                            <div class="col">
                                 <a class="text-light fs-xx mb-1 text-decoration-none" style="font-size: 21px;margin-left: 58%;cursor:pointer;" id="logout" onclick="logoutPage()">{{Auth::User()->name}}</a>
                            </div>
                         @endauth
                         @guest
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                           <li>
                              <a class="nav-link btn1 btn-danger" href="{{route('register')}}" role="button">SIGN UP</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link btn1 btn-danger" href="{{route('login')}}" role="button">LOGIN</a>
                           </li>
                        </ul>
                        @endguest
                     </div>
                     
               </nav>
              
                <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                  <div class="container-fluid">
                     <a class="navbar-brand" href="#"></a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                           <a class='nav-link @yield("active-dashboard") text-light' aria-current="page"  style="margin-right:25px" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link text-light" style="margin-right:25px" href="#">About</a>
                        </li>
                         <li class="nav-item">
                           <a class="nav-link text-light" style="margin-right:25px" href="#">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" style="margin-right:25px" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                              <li><a class="dropdown-item" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#">Something else here</a></li>
                           </ul>
                        </li>
                        <!-- <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> -->
                        </ul>
                        <!-- <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                        </form> -->
                     </div>
                  </div>
               </nav>
                @auth
               <div class="logoutPage shadow-sm" id="logoutPage">
                  <a href="#" class="bg-danger text-decoration-none text-light" id="cancel" onclick="cancel()">&times;</a>
                  
                  <form action="{{ route('logout') }}" method="post">
                     @csrf

                     <a href="{{ route('update_image',Auth::user()->id) }}">
                           <img src="{{url('storage/app/private/'.Auth::user()->image) }}" alt="image" class="img1">
                     </a>

                     <h6 class="text-light fs-xx mt-1" style="font-size: 21px; margin-left: 30%; color: blue !important;">
                           Welcome <span style="margin-left:10%;">{{ Auth::user()->name }}</span>
                     </h6>

                     <input type="submit" class="btn btn-primary mt-1" style="margin-left:30%" value="Logout">
                  </form>
               </div>
       @endauth   
          
          
       </header>
       
     
      <div class="container-fluid" style="margin-top:10%;padding: 0 2%;">
             @yield('content')
               
      </div>
       <footer>
            <div class="container-fluid footer">
               <div class="row">
                  <div class="col-12">

                  </div>
               </div>
            </div>
        </footer>
      </div>
   
        <script>
         function logoutPage(){
            const log = document.getElementById('logoutPage').style.display = "block";
            return log;
         }
          function cancel(){
            const log = document.getElementById('logoutPage').style.display = "none";
            return log;
         }
      </script>

</body>
 

</html>