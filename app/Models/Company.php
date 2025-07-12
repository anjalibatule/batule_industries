<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
   use HasFactory;
   protected $table = 'company';

    protected $fillable = [
        'company_name',
        'company_email',
        'company_mobile',
        'company_address','gst_no','status',
    ];

    
   // Format company name
    public function setCompanyNameAttribute($val)
    {
        $this->attributes['company_name'] = ucwords($val);
    }

    public function getCompanyNameAttribute($val)
    {
        return ucwords($val);
    }

    // // Store raw number
    // public function setCompanyMobileAttribute($val)
    // {
    //     $this->attributes['company_mobile'] = "+91-" . $val;
    // }

    // // Format with +91
    // public function getCompanyMobileAttribute($val)
    // {
    //     return "+91-" . $val;
    // }

    // Uppercase GST
    public function setGstNoAttribute($val)
    {
        $this->attributes['gst_no'] = strtoupper($val);
    }

    public function getGstNoAttribute($val)
    {
        return strtoupper($val);
    }
 
}
