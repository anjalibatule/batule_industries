@extends("layouts.landing")
@section('title','Dashboard')
@section('active-dashboard','active')
@section('content')
   <h3 class="text-primary">Dashboard</h3>
   
         <div class="row mt-2">
            <div class="col-3 mt-3" >
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">User</h5>
                    <p>Total Users: {{\App\Models\User::where('role','User')->Count()}}</p>
                     <a href="{{route('user')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
            <div class="col-3 mt-3" >
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Admin</h5>
                    <p>Total Admins: {{\App\Models\User::where('role','Admin')->Count()}}</p>
                     <a href="#admin" class="btn btn-primary text-light m-auto w-50 mb-3" >Show</a>
                </div>
            </div>
             <div class="col-3 mt-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Company</h5>
                    <p>Total Companies: {{\App\Models\Company::Count()}}</p>
                     <a href="{{route('company')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
             <div class="col-3 mt-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Invoices</h5>
                    <p>Total Invoices: {{\App\Models\Invoice::Count()}}</p>
                     <a href="{{route('sale')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
            <div class="col-3 mt-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Purchase Order</h5>
                     <p>Total Purchase Order: {{\App\Models\PurchaseOrder::Count()}}</p>
                       <a href="{{route('purchase_order')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
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
                    <h5 class="text-primary mt-2 mb-2">Bank Details</h5>
                     <p>Total Bank Details: {{\App\Models\Bank::Count()}}</p>
                       <a href="{{route('bank_detail')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div>
             <!-- <div class="col-3 mt-3">
                <div class="card h-100 text-center w-100 shadow-sm">
                    <h5 class="text-primary mt-2 mb-2">Product</h5>
                     <p>Total Contact: {{\App\Models\Contact::Count()}}</p>
                       <a href="{{route('sale')}}" class="btn btn-primary text-light m-auto w-50 mb-3">Show</a>
                </div>
            </div> -->
                 
         </div>

         <div class="container-fluid" style="margin-top:20%;margin-bottom:28%;">
             <div class="row mt-4" id="admin">
            <div class="col-12" >
                <h4 class="text-primary mb-4">Admin</h4>
                <div class="table-responsive">
                 <table class="table table-bordered">
                    <tr>
                        <th>SR NO.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Profile</th>
                        <th>Role</th>

                    </tr>
                    @foreach( $admin  as $index => $adm)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$adm->name}}</td>
                        <td>{{$adm->email}}</td>
                        <td>{{$adm->phone}}</td>
                        <td><img src="{{url('storage/app/private/' . $adm->image)}}" alt="" class="img" style="width:50px;"></td>
                        <td>{{$adm->role}}</td>

                    </tr>
                   @endforeach
                
                 </table>
             </div>
                  
            </div>
            
        </div>
                 
         </div>
  
@endsection