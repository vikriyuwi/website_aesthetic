<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $table = 'ART';
    protected $primaryKey = 'ART_ID';
    protected $fillable = ['ARTIST_ID', 'ART_TITLE', 'DESCRIPTION', 'VIEW', 'IS_SALE', 'PRICE'];
}
