@extends("layouts.landing")
@section('title','Dashboard')
@section('active-dashboard','active')
@section('content')
   <h3 class="text-primary">Dashboard</h3>
   
         <div class="row mt-4">
            <div class="col" >
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">User</h5>
                    <p>Total Users: {{Auth::User()->count()}}</p>
                </div>
            </div>
             <div class="col">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Company</h5>
                    <p>Total Companies: {{\App\Models\Company::Count()}}</p>
                </div>
            </div>
             <div class="col">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">User</h5>
                    <p>{{Auth::User()->count()}}</p>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">User</h5>
                    <p>{{Auth::User()->count()}}</p>
                </div>
            </div>
                 
         </div>
  
@endsection