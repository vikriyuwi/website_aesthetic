<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ArtistRating extends Model
{
    use HasFactory;
    protected $table = 'ARTIST_RATING';
    protected $primaryKey = 'ARTIST_RATING_ID';
    protected $fillable = ['ARTIST_ID', 'CONTENT','RATING_ID'];

    public function Artist()
    {
        return $this->belongsTo(Artist::class, 'ARTIST_ID', 'ARTIST_ID');
    }
}
