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

        @php
            // Get month and year from $search OR from first record
            $dateDisplay = '';

            if (!empty($search)) {
                // Use search value directly (if you're searching by "2025-07")
                try {
                    $dateDisplay = strtoupper(\Carbon\Carbon::parse($search)->format('F Y')); // e.g. July 2025
                } catch (\Exception $e) {
                    $dateDisplay = strtoupper($search); // fallback if not a full date
                }
            } elseif (!empty($invoices) && $invoices->isNotEmpty()) {
                $dateDisplay = strtoupper(\Carbon\Carbon::parse($invoices->first()->invoice_date)->format('F Y'));
            } elseif (!empty($purchases) && $purchases->isNotEmpty()) {
                $dateDisplay = strtoupper(\Carbon\Carbon::parse($purchases->first()->po_invoice)->format('F Y'));
            }
        @endphp

       @if(!empty($invoices))
            <tr>
                <td colspan="9" style="text-align: center;"><b style="text-transform:uppercase;">GST {{ $dateDisplay}}</b></td>
            </tr>
            <tr>
                <td colspan="9" style="text-align: center;"><b>SALE</b></td>
            </tr>
       @elseif(!empty($purchases))
              <tr>
                <td colspan="9" style="text-align: center;"><b>GST  {{ $dateDisplay}}</b></td>
            </tr>
            <tr>
                <td colspan="9" style="text-align: center;"><b>PURCHASE</b></td>
            </tr>
        @elseif(!empty($company))
            <tr>
                <td colspan="9"  style="text-align: center;"><b>COMPANY STATEMENT</b></td>
            </tr>
        @else
        @endif
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
    @if(!empty($invoices))
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
    @elseif(!empty($purchases))
        @foreach($purchases as $pur)
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
        </tr>
        @endforeach
     @elseif(!empty($company))
        @foreach($company as $com)
        <tr>
            <td>{{$com->invoice_date}}</td>
            <td>{{$com->invoice_number}}</td>
            <td>{{$com->company->company_name}}</td>
            <td>{{$com->company->gst_no}}</td>
            <td>{{$com->total_price}}</td>
            <td>{{$com->igst}}</td>
            <td>{{$com->cgst}}</td>
            <td>{{$com->sgst}}</td>
            <td>{{$com->total_amount}}</td>
        </tr>
        @endforeach
    @else
      <tr>
        <td   colspan="9" style="text-align: center;">No Records Found.</td>
      </tr>
    @endif

</table>