@extends("layouts.landing")
@section('title','sale Details Page')
@section('active-sale','active')
@section('content')
      <div class="row">
        <div class="col">
             <h2 class="text-primary">Invoice Bill</h2>
        </div>
       <div class="col">
             <form action="{{route('add_invoice')}}" method="get">
                <button type="submit" class="btn-primary btn" style="margin-left: 75%;padding:1%;font-size:20px;">Add Invoice <i class="fas fa-plus"></i></button>
             </form>
        </div>
     </div>
     <div class="row">
          <div class="col-6">

          </div>
          <div class="col-6">
             <form action="{{route('search_invoice_number')}}" method="get">
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
                        <th>PDF</th>
                        <th></th>
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
                         <td><a href="{{ route('pdf_view', $inv->id) }}" class="text-danger text-decoration-none">PDF</a></td>
                         <td><a href="{{route('invoice_update',$inv->id)}}"><i class="fas fa-edit text-success"></i></a></td>
                        
                    </tr>
                    @endforeach
                  
                    {{$invoices->links()}}
                 </table>
                
            </div>       
        </div>



@endsection