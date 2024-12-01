<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'POST';
    protected $primaryKey = 'POST_ID';
    protected $fillable = ['ARTIST_ID', 'CONTENT'];
}
