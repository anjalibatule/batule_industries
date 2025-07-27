<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Invoice; // Example model
use App\Models\Contact; // Example model

class PDFController extends Controller
{
    // View PDF in Browser
    public function viewPDF($id)
    {
        $invoice = Invoice::with(['company','invoice_desc'])->findOrFail($id);
        $contact = Contact::find(1);
        $pdf = Pdf::loadView('pdf_invoice', compact('invoice','contact'));
        return $pdf->stream('invoice.pdf'); // Opens in browser
    }

    // Download PDF
    public function downloadPDF($id)
    {
        $invoice = Invoice::with(['company','invoice_desc'])->findOrFail($id);
         $contact = Contact::find(1);
        $pdf = Pdf::loadView('pdf_invoice', compact('invoice','contact'));
        return $pdf->download('invoice.pdf'); // Force download
    }
}
