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
                <button type="submit" class="btn-primary btn add">Add <i class="fas fa-plus"></i></button>
             </form>
        </div>
     </div>
     <div class="row">
          <div class="col">

          </div>
          <div class="col">
             <form action="{{route('search_invoice_number')}}" method="get">
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
                   @php
                      use Illuminate\Support\Str;

                     $isDateMatch = $invoices->contains(function ($inv) {
                        return Str::startsWith($inv->invoice_date, request('search'));
                        // or: return strpos($inv->invoice_date, request('search')) === 0;
                     });


                     $isGstMatch = $invoices->contains(function ($inv) {
                        return $inv->company && $inv->company->gst_no === request('search');
                     });
                  @endphp

                    @if($isDateMatch)
                         <div class="text-center mt-3">
                           <a href="{{route('gst_sale_pdf',request('search'))}}" name="search" class="btn btn-danger">Download PDF</a>
                         </div>
                    @elseif($isGstMatch)
                        <div class="text-center mt-3"> 
                           <a href="{{route('company_statement_pdf',request('search'))}}" name="search" class="btn btn-danger">Download Company Statement</a>
                        </div>
                   @else
                   @endif
                
            </div>   
          </div>    
        </div>



@endsection