<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
