@extends("layouts.landing")
@section('title','Dashboard')
@section('active-dashboard','active')
@section('content')
   <h3 class="text-primary">Dashboard</h3>
   
         <div class="row mt-4">
            <div class="col-3" >
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">User</h5>
                    <p>Total Users: {{Auth::User()->count()}}</p>
                     <a href="{{route('user')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
             <div class="col-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Company</h5>
                    <p>Total Companies: {{\App\Models\Company::Count()}}</p>
                     <a href="{{route('company')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
             <div class="col-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Invoices</h5>
                    <p>Total invoices: {{\App\Models\Invoice::Count()}}</p>
                     <a href="{{route('sale')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
            <div class="col-3 ">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Purchase Order</h5>
                     <p>Total Purchase Order: {{\App\Models\Invoice::Count()}}</p>
                       <a href="{{route('sale')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
              <div class="col-3 mt-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Contact</h5>
                     <p>Total Contact: {{\App\Models\Contact::Count()}}</p>
                       <a href="{{route('contact_detail')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
             <div class="col-3 mt-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Product</h5>
                     <p>Total Contact: {{\App\Models\Contact::Count()}}</p>
                       <a href="{{route('sale')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
                 
         </div>
  
@endsection