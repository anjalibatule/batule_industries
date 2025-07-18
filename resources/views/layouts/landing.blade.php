<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Batule Industries-@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="resources/css/landing.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- jQuery (Google CDN) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     
    <style>
       *{
         margin:0;
         padding:0;
         box-sizing:border-box;
      }
  :root{
    --primary:blue;
   }
   

      /* pagination */
      svg{
         width:3% !important;
      }
      nav{
         margin-left: 40% !important;
         margin-top: 2%;
      }
      nav p{
         margin-top: 14px;
         /* margin-bottom: 1rem; */
         /* margin-left: 5%; */
      
      }
      /* nav .justify-between{
         margin-left: 4% !important;
      } */
      

    .side-bar{
        background:var(--primary);
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 10%;
   }
   body{
    background:#b0afaf;
   }
   .nav-bar{
        background: var(--primary);
        height: 55px;
        width: 88%;
        position: fixed;
        top: 0;
        left: 11%;
   }
   .body-bar{
        background: white;
        position: fixed;
        top: 9%;
        left: 11%;
        height:82%;
        width: 88%;
        overflow-y:scroll;
        padding:2%;
        z-index: -100%;
   }
    footer{
        background:  var(--primary);
        position: fixed;
        bottom:0;
        left: 11%;
        height:55px;
        width: 88%;
        right:0;
   }
   .btn1{
    padding:5px;
    color:white;
    background: var(--primary);
    border-radius:10px;
    font-size:20px;
    margin-left:32%;
    border:none;
   }
    .btn1:hover{
      background:red;
      color:white;
      /* font-size:25px; */
    }
     .nav-link{
        color: #fff;
         text-transform: uppercase;
         text-decoration: none;
         letter-spacing: 0.15em;
         display: inline-block;
         padding: 15px 10px;
         position: relative;
        }
        .nav-link.active {
            color:white; /* Bootstrap primary color */
            font-size:16px;
            border-bottom:2px solid white;
            width:100%;
        }

        .nav-link.active:hover,
        .nav-link.active:focus {
            color: #0a58ca;
        }
        /* .nav-link:hover{
            border-bottom: 2px solid white;
            transition: all 0.2s ease;
            width:98%;
            /* position:absolute; */
            
        /* } */ 
        /* Underlined css */
        .nav-link:after {    
            background: none repeat scroll 0 0 transparent;
            bottom: 0;
            content: "";
            display: block;
            height: 2px;
            left: 50%;
            position: absolute;
            background: #fff;
            transition: width 0.3s ease 0s, left 0.3s ease 0s;
            width: 0;
            }
            .nav-link:hover:after { 
            width: 100%; 
            left: 0; 
            }
         
            /* logoutf form */
        .logoutPage{
            position: fixed;
            top: 6%;
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
         top:45px;
         border:none;
        }
        .img1{
        border-radius: 50%;
         width: 40%;
         margin-left: 29%;
         margin-top: 12%;
        }
         .search{
          margin-left: 61%;
         padding: 1%;
         margin-top: 3%;
         border-radius: 15px;
       }
    </style>
    </head>
<body>
     <div class="container-fluid">
        <div class="row">
            <div class="col-2 side-bar">
                
                 <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="margin-top:15%;margin-right:25px;font-size:20px;">
                           <a class="text-decoration-none text-light" style="font-size: 25px " aria-current="page" href="#">BATULE INDUSTRIES</a>
                        </li>
                         <li class="nav-item mt-3">
                           <a class='nav-link @yield("active-dashboard") text-light' aria-current="page"  style="margin-right:25px" href="{{route('dashboard')}}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                           <a class='nav-link @yield("active-user") text-light' aria-current="page"  style="margin-right:25px" href="{{route('user')}}">Users</a>
                        </li>
                        <li class="nav-item">
                           <a class='nav-link @yield("active-company") text-light' style="margin-right:25px" href="{{route('company')}}">Company</a>
                        </li>
                         <li class="nav-item">
                           <a class='nav-link @yield("active-contact-detail") text-light' style="margin-right:25px" href="{{route('contact_detail')}}">Contact</a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle text-light @yield('active-dashboard')" href="#" id="navbarDropdown" style="margin-right:25px" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Dropdown
                           </a>
                           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item @yield('active-dashboard')" href="#">Action</a></li>
                              <li><a class="dropdown-item @yield('active-dashboard')" href="#">Another action</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item @yield('active-dashboard')" href="#">Something else here</a></li>
                           </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li> -->
                        </ul>
            </div>
            <div class="col-10 nav-bar">
                <div class="row mt-3">
                    <div class="col">
                    </div>
                     <div class="col">
                       
                          <div class="row">
                            <div class="col">

                            </div>
                            @auth
                            <div class="col">
                                 <a class="text-light fs-xx mb-1 text-decoration-none" style="font-size: 21px;margin-left: 64%;cursor:pointer;" id="logout" onclick="logoutPage()">{{Auth::User()->name}}</a>
                            </div>
                             @endauth
                          </div>
                    </div>
                </div>
                <div class="body-bar">
                    @yield("content")
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
              </div>
            </div>
        </div>
        <footer>

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