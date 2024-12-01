<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistCollection extends Model
{
    use HasFactory;
    protected $table = 'ARTIST_COLLECTION';
    protected $primaryKey = 'ARTIST_COLLECTION_ID';
    protected $fillable = ['COLLECTION_NAME', 'COLLECTION_DESCR','USER_ID'];
}
