<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Company;
use  App\Models\InvoiceDescr;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
   use HasFactory;
   protected $table = 'invoice';
   
   protected $fillable = [
    'invoice_number', 'invoice_date', 'po_no', 'po_date', 'company_id',
    'total_price', 'igst', 'cgst', 'sgst', 'total_amount',
    'payment_method', 'payment', 'status', 'totalAmountWords'
   ];

   public function company()
        {
            return $this->belongsTo(Company::class);
        }
        public function invoice_desc()
        {
            return $this->hasMany(InvoiceDescr::class);
        }
}