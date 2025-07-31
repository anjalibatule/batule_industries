<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
   use HasFactory;
   protected $table = 'bank';

    protected $fillable = [
        'bank_name',
        'account',
        'account_branch',
        'address','micr','swif','ifsc',
    ];
}