@extends("layouts.landing")
@section('title','Bank Details Page')
@section('active-bank-detail','active')
@section('content')

    <div class="row">
        <div class="col">
             <h2 class="text-primary">Bank Details</h2>
        </div>
     </div>  
     <div class="container-fluid mt-3" id="contact">
        <div class="row">
            <div class="col-12">
                <form action="{{route('bank_update',$bank->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-4 mt-3">
                            <label for="bank_name">Bank Name:</label>
                           <input type="text" name="bank_name" value="{{$bank->bank_name}}"  class="w-100 mt-1 form-control">
                        </div>
                         <div class="col-4 mt-3">
                            <label for="address">Address:</label>
                           <input type="text" name="address" value="{{$bank->address}}"  class="w-100 mt-1 form-control">
                        </div>
                        <div class="col-4 mt-3">
                            <label for="account">Account Number : </label>
                            <input type="number" name="account" value="{{$bank->account}}"   class="w-100 mt-1 form-control">                          
                        </div>
                        <div class="col-4 mt-3">
                            <label for="account_branch">Account Branch : </label>
                           <input type="text" name="account_branch" value="{{$bank->account_branch}}"  class="w-100 mt-1 form-control" >
                        </div>
                    
                        <div class="col-4 mt-3">
                            <label for="ifsc">IFSC : </label>
                           <input type="text" name="ifsc" value="{{$bank->ifsc}}"   class="w-100 mt-1 form-control" >
                        </div>

                        <div class="col-4 mt-3">
                            <label for="micr">MICR : </label>
                           <input type="text" name="micr" value="{{$bank->micr}}"   class="w-100 mt-1 form-control" >
                        </div>
                        <div class="col-4 mt-3">
                            <label for="swif">SWIF Code : </label>
                           <input type="text" name="swif" value="{{$bank->swif}}"   class="w-100 mt-1 form-control" >
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
     </div>   
      
      
       


       
    
                 
  
@endsection