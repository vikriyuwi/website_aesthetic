<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtLike extends Model
{
    use HasFactory;
    protected $table = 'ART_LIKE';
    protected $primaryKey = 'ART_LIKE_ID';
    protected $fillable = ['USER_ID', 'ART_ID'];
}
