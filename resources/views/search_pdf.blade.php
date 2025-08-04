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
</style>

<table class="table table-bordered" style="margin-top:10px;">
 
        <tr>
            <td colspan="9" style="text-align: center;"><b>GST</b></td>
        </tr>
        <tr>
            <td colspan="9" style="text-align: center;"><b>SALE</b></td>
        </tr>
 
    <tr>
        <th>Date</th>
        <th>Invoice Number</th>
        <th>Company Name</th>
        <th>GST Number</th>
        <th>Sub Total</th>
        <th>IGST</th>
        <th>CGST</th>
        <th>SGST</th>
        <th>Grand Total</th>
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
    </tr>
    @endforeach

</table>