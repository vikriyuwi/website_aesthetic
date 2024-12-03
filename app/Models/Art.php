<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Art extends Model
{
    use HasFactory;

    protected $table = 'ART';
    protected $primaryKey = 'ART_ID';
    protected $fillable = ['ARTIST_COLLECTION_ID', 'ART_TITLE', 'DESCRIPTION', 'VIEW', 'IS_SALE', 'PRICE'];

    public function ArtistCollection(): BelongsTo
    {
        return $this->belongsTo(ArtistCollection::class, 'ARTIST_COLLECTION_ID', 'ARTIST_COLLECTION_ID');
    }

    public function ArtCategories(): HasMany
    {
        return $this->hasMany(ArtCategory::class, 'ART_ID', 'ART_ID');
    }

    public function ArtLikes(): HasMany
    {
        return $this->hasMany(Art::class, 'ART_ID', 'ART_ID');
    }

    public function ArtImages(): HasMany
    {
        return $this->hasMany(ArtImage::class, 'ART_ID', 'ART_ID');
    }
}
