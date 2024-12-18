<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table = 'CONTACT_US';
    protected $primaryKey = 'CONTACT_US_ID';
    protected $fillable = ['FULLNAME', 'EMAIL', 'PHONE_NUMBER', 'MESSAGE'];
}
