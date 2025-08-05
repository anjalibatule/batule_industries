@extends("layouts.landing")
@section('title','Purchase Order Page')
@section('active-purchase','active')
@section('content')
     
<div class="row mt-3">
        <div class="col">
             <h2 class="text-primary">Purchase Order</h2>
        </div>
        <div class="col">
             <form action="{{route('add_purchase')}}" method="get">
                <button type="submit" class="btn-primary btn add" >Add <i class="fas fa-plus"></i></button>
             </form>
        </div>
      </div> 
       <div class="row">
          <div class="col">

          </div>
          <div class="col">
             <form action="{{route('search_purchase_number')}}" method="get">
                <input type="text" placeholder="Search" class="search"  id="search" name="search" value="{{ request('search') }}">
                <button type="submit" value="Search" class="btn btn-primary" style="border-radius:10px !important"><i class="fas fa-search"></i></button>
              </form>
        </div>
     </div>
      
       <div class="row mt-4">
            <div class="col-12" >
               <div class="table-responsive">
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
                        <th>Status</th>
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
                        <td>
                            <form action="{{ route('update_purchase_status', $pur->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="1" {{ old('status', $pur->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $pur->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </form>
                        
                           </td>
                         <td><a href="{{route('update_purchase',$pur->id)}}"><i class="fas fa-edit text-success"></i></a></td>
                        
                    </tr>
                    @endforeach
                  
                    {{$purchase->links()}}
                 </table>
                
                  @php
                   use Illuminate\Support\Str;

                     $isDateMatch = $purchase->contains(function ($pur) {
                        return Str::startsWith($pur->po_date, request('search'));
                     });
   
               @endphp

               @if($isDateMatch)
                  <div class="text-center mt-3">
                     <a href="{{ route('gst_purchase_pdf', request('search'))}}" class="btn btn-danger">Download PDF</a>
                  </div>
               @endif
            </div>       
        </div>
      </div>


@endsection