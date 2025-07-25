<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseOrder extends Model
{
   use HasFactory;
   protected $table = 'purchase_order';
   public function company()
        {
            return $this->belongsTo(Company::class);
        }
}
