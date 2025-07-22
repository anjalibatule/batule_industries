@extends("layouts.landing")
@section('title','Purchase Order Page')
@section('active-purchase','active')
@section('content')
 <a href="{{route('purchase_order')}}" class="btn btn-primary text-light" style="border-radius:50%;"><i class="fas fa-arrow-left"></i> </a>    
<div class="row mt-3">
        <div class="col">
             <h2 class="text-primary">Add Purchase Order</h2>
        </div>
        
      </div> 


@endsection