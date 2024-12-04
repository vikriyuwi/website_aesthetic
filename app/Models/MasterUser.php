<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\MasterUser as Authenticatable;

class MasterUser extends Authenticatable
{
    use HasFactory;
    protected $table = 'MASTER_USER';
    protected $primaryKey = 'USER_ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=[
        'USERNAME',
        'EMAIL',
        'PASSWORD',
        'USER_LEVEL',
        'IS_ACTIVE'
    ];

    public function Buyer():HasOne
    {
        return $this->hasOne(Buyer::class, 'USER_ID', 'USER_ID');
    }

    public function Artist():HasOne
    {
        return $this->hasOne(Artist::class, 'USER_ID', 'USER_ID');
    }

    public function Arts():HasMany
    {
        return $this->hasMany(Art::class, 'USER_ID', 'USER_ID');
    }

    public function ArtLikes():HasMany
    {
        return $this->hasMany(ArtLike::class, 'USER_ID', 'USER_ID');
    }

    public function PostLikes():HasMany
    {
        return $this->hasMany(PostLike::class, 'USER_ID', 'USER_ID');
    }

    public function PostComments():HasMany
    {
        return $this->hasMany(PostComment::class, 'USER_ID', 'USER_ID');
    }

    public function getAuthPassword()
    {
        return $this->PASSWORD;
    }

    

    // public function Artists()
    // {
    //     return $this->hasOne(Artist::class);
    // }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'PASSWORD'
    ];
}
