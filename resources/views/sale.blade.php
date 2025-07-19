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
       <div class="row mt-4">
            <div class="col-12" >
                 <table class="table table-bordered">
                    <tr>
     
                        <th>Invoice Date</th>
                        <th>Invoice Number</th>
                        <th>Company Name</th>
                        <th>GST Number</th>
                        <th>Total</th>
                        <th>IGST</th>
                        <th>SGST</th>
                        <th>CGST</th>
                        <th>Total Amount</th>   
                    </tr>
                    <tr>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                         <td></td>
                    </tr>
                    
                  


                 
                 </table>
                
            </div>       
        </div>



@endsection