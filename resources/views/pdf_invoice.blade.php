<style>
    .table-bordered {
        width: 100%;
        border: 1px solid #000;
        border-collapse: collapse;
        margin: 0 auto;
    }

    .table-bordered th, 
    .table-bordered td {
        border: 1px solid #000;
        padding:10px;
        font-size: 10px;
    }

    .table-bordered th {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    /* Optional: Remove extra spacing around the table */
    .table-bordered {
        margin-bottom: 0;
    }
    .m-0{
        margin:0;
    }
    .text-center{
       text-align:center; 
    }
    span{
        padding-left:8px;
    }
    .row {
 
    
    display: flex;
    flex-wrap: wrap;
    }
    tr .desc{
        border-left:none !important;
        border-right:none !important;

    }
</style>

<h6 style="text-align:center;margin:0">DOMESTIC/LOCAL PO SALE</h6>
 <h3  style="text-align:center;margin:0;">TAX INVOICE</h3>

 <h2  style="text-align:center;margin:0;">{{ $contact->contact_company_name}}</h2>
 <h5  style="text-align:center;margin:0;">Regt. Off. Address :- {{ $contact->contact_address}}</h5>
 <h5  style="text-align:center;margin:0;">Works Address :- {{ $contact->contact_address}}</h5>

<table class="table table-bordered" style="margin-top:10px;">
    <tr>
       <td colspan="4">
        <b>Date of Invoice:</b><span>{{$invoice->invoice_date}}</span><br>
       <b>Invoice Serial No. :</b><span>{{$invoice->invoice_number}}</span><br>
       <b>GSTIN NO:</b><span>{{ $contact->gst_number }}</span><br>
       <b>PAN NO:</b><span>{{ substr($contact->gst_number, 2, 10) }}</span><br>
       <b>CIN NO:</b><span>{{$invoice->cin}}</span><br>
       <b>E-Way Bill No(if any):</b><span>{{$invoice->e_way}}</span><br>  
       </td>
       <td colspan="4">
        <b>Transporter & Mode:</b><span>{{$invoice->transport}}</span><br>
       <b>Vehicle No. :</b><span>{{$invoice->vehicle_no}}</span><br>
       <b>Place of Supply:</b><span>{{ substr($invoice->company->gst_no, 0, 2) }}</span><span> {{$invoice->company->state}}</span><br>
       <b>Date & Time of Supply:</b><span>{{$invoice->created_at}}</span><br>
       <b>PO NO:</b>
       @if($invoice->po_no === NULL)
       <span></span><br>
       @else
          <span>{{$invoice->po_no}}</span><br>
       @endif
       <b>LR NO:</b><span>{{$invoice->lr_no}}</span><br>  
       </td>
      
    </tr>
  
   
    <tr>
        <td colspan="4">
            <b style="text-align:center;">Details of Recipient(Bill To)</b>
        </td>
       <td colspan="4">
          <b style="text-align:center;">Details of Delivery(Ship To)</b>
       </td>
       
    </tr>
    <tr>
        <td colspan="4">
             <b>Name:</b><span>{{$invoice->company->company_name}}</span><br>
       <b>Address:</b><span style="margin-bottom:20px;">{{$invoice->company->company_address}}</span><br>
       <b>State Code & Name:</b><span>{{ substr($invoice->company->gst_no, 0, 2) }}</span><span> {{$invoice->company->state}}</span><br>
       <b>GSTIN NO:</b><span> {{$invoice->company->gst_no}}</span><br>
       <b>PAN NO:</b><span>{{ substr($invoice->company->gst_no, 2, 10) }}</span><br>
        </td>
        <td colspan="4">
             <b>Name:</b><span>{{$invoice->company->company_name}}</span><br>
       <b>Address:</b><span style="margin-bottom:20px;">{{$invoice->company->company_address}}</span><br>
       <b>State Code & Name:</b><span>{{ substr($invoice->company->gst_no, 0, 2) }}</span><span> {{$invoice->company->state}}</span><br>
       <b>GSTIN NO:</b><span> {{$invoice->company->gst_no}}</span><br>
       <b>PAN NO:</b><span>{{ substr($invoice->company->gst_no, 2, 10) }}</span><br>
        </td>
    </tr>

         

        <tr class="desc">
            <td><b>Sr.</b></td>
          
            <td colspan="2"><b>Description of Goods & Services</b></td>
            <td><b>HSN / SAC</b></td>
            <td><b>Quantity     Unit</b></td>
            <td><b>Rate / Unit</b></td>
            <td><b>Rate for Qty</b></td>
            <td><b>Amount</b></td>
        </tr>
 
        @foreach($invoice->invoice_desc as $index => $inv_desc)
        <tr class="desc">
            <td>{{ $index + 1 }}</td>
         
            <td colspan="2">{{ $inv_desc->descrip }}</td>
            <td>{{ $inv_desc->hsn_code }}</td>
            <td>{{ $inv_desc->quantity }}   NOS</td>
            <td>{{ $inv_desc->unit }}</td>
            <td>1.00</td>
            <td>{{ $inv_desc->total_tax }}</td>
        </tr>
        @endforeach
   

    <tr>
        
         <td colspan="8" >
            <b style="margin-left:55%;">Tax/Other Charges</b>  <b style="margin-left:20%;">Result</b>
            @if($invoice->igst==0)
             <p style="margin-left:55%;">CGST On  <span style="margin-left:20px;"> {{$invoice->total_price}}</span><span style="margin-left:10px;"> @  </span><span style="margin-left:10px;">9.00 %</span><span style="margin-left:30px;">{{$invoice->cgst}}</span></p>
             <p style="margin-left:55%;">SGST On  <span style="margin-left:20px;"> {{$invoice->total_price}}</span><span style="margin-left:10px;"> @  </span><span style="margin-left:10px;">9.00 %</span><span style="margin-left:30px;">{{$invoice->sgst}}</span></p>
            @else
                <p style="margin-left:55%;">IGST On  <span style="margin-left:20px;"> {{$invoice->total_price}}</span><span style="margin-left:10px;"> @  </span><span style="margin-left:10px;">18.00 %</span><span style="margin-left:30px;">{{$invoice->igst}}</span></p>
            @endif
        </td>
    </tr> 
   
    <tr>
        <td colspan="8">
            <p style="margin-left:35%;margin-bottom:0;margin-top:0;"><b>TOTAL : </b>                  <b style="margin-left:40%;">Rs.</b>     <b style="margin-left:33%;">{{$invoice->total_price}}</b></p>
        </td>
    </tr>
     <tr>
        <td colspan="4">
            <div> <b style="margin-top:0;margin-bottom:0;">Total Invoice Value in Words :</b><span>Rs {{$invoice->totalAmountWords}}</span></div>
        </td>
        <td colspan="4">
             @if($invoice->igst==0)
             <p ><b style="margin-left:20%;margin-top:0;">CGST On @</b><span style="margin-left:10px;">9.00 %</span><b style="margin-left:30px;">{{$invoice->cgst}}</b></p>
             <p ><b style="margin-left:20%;margin-bottom:0">SGST On @</b><span style="margin-left:10px;">9.00 %</span><b style="margin-left:30px;">{{$invoice->sgst}}</b></p>
            @else
                <p style="margin-left:20%;margin-top:0;margin-bottom:0;"><b>IGST On @</b><span style="margin-left:10px;">18.00 %</span><b style="margin-left:30px;">{{$invoice->igst}}</b></p>
            @endif
        </td>

    </tr>
    <tr>
        <td rowspan="4" colspan="4">  <img src="data:image/png;base64,{{ $qrCode }}" alt="QR Code" width="200" style="margin:0 24%;"><br></td>
        <td colspan="4">
            <b style="margin-left:20%;">TOTAL AMOUNT : </b> <b style="margin-left:20%;">{{$invoice->total_amount}}</b> 
        </td>
    </tr>
    <tr>
        <td colspan="4">
            <h3>FOR,  {{$contact->contact_company_name}}</h3>

            <h3 class="text-center" style="text-transform:uppercase;">{{$contact->owner}}</h3>
            <h3 class="text-center" style="margin-top:0">Signature / Digital Signature of </h3>
            <h3 class="text-center">Authorized Signatory</h3>
        </td>
    </tr>
    <tr> 
        <td colspan="4">
            <b>Bank Name : {{$bank->bank_name}} </b><br>
        <b>Address : {{$bank->address}}</b><br>
            <b>Account Branch : {{$bank->account}}</b><br>
            <b>Account No. : {{$bank->account_branch}} </b><br>
        <b>IFSC : {{$bank->ifsc}}</b><br>
        <b>MICR : {{$bank->micr}}</b><br>
        <b>SWIF CODE : {{$bank->swif}}</b>

        </td>

    </tr>
    <tr>
          <td colspan="4"></td>
    </tr>
</table>