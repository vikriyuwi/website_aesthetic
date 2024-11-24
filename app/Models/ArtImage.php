<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtImage extends Model
{
    use HasFactory;
    protected $table = 'ART_IMAGE';
    protected $primaryKey = 'ART_IMAGE_ID';
    protected $fillable = ['ART_ID', 'IMAGE_PATH'];
}
