<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtCategory extends Model
{
    use HasFactory;
    protected $table = 'ART_CATEGORY';
    protected $primaryKey = 'ART_CATEGORY_ID';
    protected $fillable = ['ART_ID', 'ART_CATEGORY_MASTER_ID'];
}
