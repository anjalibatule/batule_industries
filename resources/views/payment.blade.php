@extends("layouts.landing")
@section('title','Sale Payment Details Page')
@section('active-sale','active')
@section('content')
     <div class="container-fluid row bg-primary">
          <div class="col-1">
                 <a class='nav-link1 active text-light' aria-current="page"  style="margin-right:25px" href="{{route('payment')}}">Pending</a>
          </div>
          <div class="col-1">
                   <a class='nav-link1 text-light'  href="{{route('inactive_payment')}}">Paid</a>
          </div>

    </div>
     <div class="row">
          <div class="col-6">

          </div>
          <div class="col-6">
             <form action="{{route('search_payment')}}" method="get">
                <input type="text" placeholder="Search" class="search"  id="search" name="search" value="{{ request('search') }}">
                <button type="submit" value="Search" class="btn btn-primary" style="border-radius:10px !important"><i class="fas fa-search"></i></button>
              </form>
        </div>
     </div>
      
       <div class="row mt-4">
            <div class="col-12" >
                 <table class="table table-bordered">
                    <tr>
     
                        <th>Invoice Date</th>
                        <th>Invoice Number</th>
                        <th>Company Name</th>
                        <th>GST Number</th>
                        <th>Amount</th>
                        <th>IGST</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>Total Amount</th>   
                        <th>Payment</th>
                       
                    </tr>
                    @foreach($invoices as $inv)
                    <tr>
                         <td>{{$inv->invoice_date}}</td>
                         <td>{{$inv->invoice_number}}</td>
                         <td>{{$inv->company->company_name}}</td>
                         <td>{{$inv->company->gst_no}}</td>
                         <td>{{$inv->total_price}}</td>
                         <td>{{$inv->igst}}</td>
                         <td>{{$inv->cgst}}</td>
                         <td>{{$inv->sgst}}</td>

                         <td>{{$inv->total_amount}}</td>
                          <td>
                            <form action="{{ route('update_payment', $inv->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select class="form-control" name="payment" onchange="this.form.submit()">
                                    <option value="1" {{ old('payment', $inv->payment) == 1 ? 'selected' : '' }}>Pending</option>
                                    <option value="0" {{ old('payment', $inv->payment) == 0 ? 'selected' : '' }}>Paid</option>
                                </select>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                  
                    {{$invoices->links()}}
                 </table>
                
            </div>       
        </div>



@endsection