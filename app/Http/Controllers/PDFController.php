<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice; // Example model
use App\Models\Contact; // Example model
use App\Models\Bank; // Example model
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    // View PDF in Browser
    public function viewPDF($id)
    {

         $invoice = Invoice::with(['company','invoice_desc'])->findOrFail($id);
        $contact = Contact::find(1);
        $bank = Bank::find(1);

         $upiID = 'anjalibatule7@okaxis';
         $name = 'BATULE INDUSTRIES';
         $amount = $invoice->total_amount;
        $note = 'PO Payment';

         $upiString = "upi://pay?pa=$upiID&pn=$name&am=$amount&cu=INR&tn=$note";
        $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($upiString));
         
       
        $pdf = Pdf::loadView('pdf_invoice', compact('invoice','contact','bank','qrCode'));
        return $pdf->stream('invoice.pdf'); // Opens in browser
    }

    // Download PDF
    public function downloadPDF($id)
    {
         $invoice = Invoice::with(['company','invoice_desc'])->findOrFail($id);
        $contact = Contact::find(1);
        $bank = Bank::find(1);

         $upiID = 'anjalibatule7@okaxis';
         $name = 'BATULE INDUSTRIES';
         $amount = $invoice->total_amount;
        $note = 'PO Payment';

         $upiString = "upi://pay?pa=$upiID&pn=$name&am=$amount&cu=INR&tn=$note";
        $qrCode = base64_encode(QrCode::format('png')->size(200)->generate($upiString));

        $pdf = Pdf::loadView('pdf_invoice', compact('invoice','contact','bank','qrCode'));
        return $pdf->download('invoice.pdf'); // Force download
    }

      public function gst_sale_pdf(Request $request)
        {
            $search = $request->search;

            $invoices = Invoice::with('company')
                ->where('status',1)
                  ->where(function ($query) use ($search) {
                        $query->where('invoice_number', 'like', "%$search%")
                            ->orWhere('invoice_date', 'like', "%$search%")
                            ->orWhereRelation('company', 'company_name', 'like', "%$search%")
                            ->orWhereRelation('company', 'gst_no', 'like', "%$search%");
                    })
                                ->orderBy('invoice_date', 'asc')
                ->get();

            $pdf = Pdf::loadView('search_pdf', compact('invoices', 'search'));
            return $pdf->stream('gst.pdf'); // Open in browser
        }
}
