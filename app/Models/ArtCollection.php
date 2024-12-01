<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtCollection extends Model
{
    use HasFactory;
    protected $table = 'ART_COLLECTION';
    protected $primaryKey = 'ART_COLLECTION_ID';
    protected $fillable = ['ARTIST_COLLECTION_ID', 'ART_ID'];
}
