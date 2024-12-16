<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistReport extends Model
{
    use HasFactory;
    protected $table = 'ARTIST_REPORT';
    protected $primaryKey = 'ARTIST_REPORT_ID';
    protected $fillable = ['ARTIST_ID', 'USER_ID', 'USER_RATING', 'CONTENT'];

    public function Artist()
    {
        return $this->belongsTo(Artist::class, 'ARTIST_ID', 'ARTIST_ID');
    }

    public function MasterUser(): BelongsTo
    {
        return $this->belongsTo(MasterUser::class, 'USER_ID', 'USER_ID');
    }
}
