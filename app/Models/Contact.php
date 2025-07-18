<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
   use HasFactory;
   protected $table = 'contact';

    protected $fillable = [
        'contact_company_name',
        'contact_email',
        'contact_mobile',
        'contact_address','gst_number','map',
    ];
}