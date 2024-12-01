<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostMedia extends Model
{
    use HasFactory;
    protected $table = 'POST_MEDIA';
    protected $primaryKey = 'POST_MEDIA_ID';
    protected $fillable = ['POST_ID', 'POST_MEDIA_PATH'];
}
