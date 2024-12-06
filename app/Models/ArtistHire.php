<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistHire extends Model
{
    use HasFactory;
    protected $table = 'ARTIST_HIRE';
    protected $primaryKey = 'ARTIST_HIRE_ID';
    protected $fillable = [
        'ARTIST_ID',
        'PROJECT_TITLE',
        'PROJECT_DESCR',
        'PROJECT_TIMELINE',
        'PROJECT_BUDGET',
        'PROJECT_SKILLS',
        'PROJECT_EXPERIENCE_LEVEL',
        'OTHER_REQUIREMENTS'
    ];

    public function Artist()
    {
        return $this->belongsTo(Artist::class, 'ARTIST_ID', 'ARTIST_ID');
    }
}
