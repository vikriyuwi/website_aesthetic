<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;

    protected $table = 'POST_COMMENT';
    protected $fillable = ['POST_ID', 'USER_ID', 'CONTENT', 'created_at'];
}
