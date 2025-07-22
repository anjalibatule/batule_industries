@extends("layouts.landing")
@section('title','Purchase Order Page')
@section('active-purchase','active')
@section('content')
     
<div class="row mt-3">
        <div class="col">
             <h2 class="text-primary">Purchase Order Details</h2>
        </div>
        <div class="col">
             <form action="{{route('add_purchase')}}" method="get">
                <button type="submit" class="btn-primary btn" style="margin-left: 88%;padding:1%;font-size:20px;">Add <i class="fas fa-plus"></i></button>
             </form>
        </div>
      </div> 


@endsection