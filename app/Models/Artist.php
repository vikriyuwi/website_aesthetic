<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'ARTIST';
    protected $primaryKey = 'ARTIST_ID';
    protected $fillable = ['USER_ID', 'LOCATION','ROLE','BIO','ABOUT'];

    public function MasterUser()
    {
        return $this->belongsTo(MasterUser::class, 'USER_ID', 'USER_ID');
    }

    public function ArtistRattings(): HasMany
    {
        return $this->hasMany(Artist::class, 'ARTIST_ID', 'ARTIST_ID');
    }

    public function Collections(): HasMany
    {
        return $this->hasMany(ArtistCollection::class, 'ARTIST_ID', 'ARTIST_ID');
    }
}
