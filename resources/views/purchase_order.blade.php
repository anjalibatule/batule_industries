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
       <div class="row">
          <div class="col-6">

          </div>
          <div class="col-6">
             <form action="{{route('search_purchase_number')}}" method="get">
                <input type="text" placeholder="Search" class="search"  id="search" name="search" value="{{ request('search') }}">
                <button type="submit" value="Search" class="btn btn-primary" style="border-radius:10px !important"><i class="fas fa-search"></i></button>
              </form>
        </div>
     </div>
      
       <div class="row mt-4">
            <div class="col-12" >
                 <table class="table table-bordered">
                    <tr>
     
                        <th>Purchase Date</th>
                        <th>Purchase Number</th>
                        <th>Company Name</th>
                        <th>GST Number</th>
                        <th>Amount</th>
                        <th>IGST</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>Total Amount</th>   
                        
                        <th></th>
                    </tr>
                    @foreach($purchase as $pur)
                    <tr>
                         <td>{{$pur->po_date}}</td>
                         <td>{{$pur->po_invoice}}</td>
                         <td>{{$pur->company->company_name}}</td>
                         <td>{{$pur->company->gst_no}}</td>
                         <td>{{$pur->total_price}}</td>
                         <td>{{$pur->igst}}</td>
                         <td>{{$pur->cgst}}</td>
                         <td>{{$pur->sgst}}</td>

                         <td>{{$pur->total_amount}}</td>
                       
                         <td><a href="{{route('update_purchase',$pur->id)}}"><i class="fas fa-edit text-success"></i></a></td>
                        
                    </tr>
                    @endforeach
                  
                    {{$purchase->links()}}
                 </table>
                
            </div>       
        </div>



@endsection