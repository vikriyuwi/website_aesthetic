<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
        'USER_LEVEL'
    ];

    public function Buyers():HasOne
    {
        return $this->hasOne(Buyer::class);
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
