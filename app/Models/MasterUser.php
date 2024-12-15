<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function ArtistRating(): HasMany
    {
        return $this->hasMany(ArtistRating::class, 'USER_ID', 'USER_ID');
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

    public function Carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'USER_ID', 'USER_ID');
    }

    public function Orders(): HasMany
    {
        return $this->hasMany(Order::class, 'USER_ID', 'USER_ID');
    }

    public function Addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'USER_ID', 'USER_ID');
    }

    public function getTotalEarningAttribute()
    {
        return $this->Arts()->with('OrderItems')
        ->get()
        ->flatMap(function ($art) {
            return $art->OrderItems;
        })
        ->sum(function ($orderItem) {
            return $orderItem->QUANTITY * $orderItem->PRICE_PER_ITEM;
        });
    }

    public function getTotalEarningByMonth(int $month)
    {
        // Use the relationship to filter by month and sum up the total price
        return $this->Arts()->with(['OrderItems' => function ($query) use ($month) {
            $query->whereMonth('created_at', $month); // Filter by the given month
        }])
        ->get()
        ->flatMap(function ($art) {
            return $art->OrderItemss;
        })
        ->sum(function ($orderItem) {
            return $orderItem->QUANTITY * $orderItem->PRICE_PER_ITEM;
        });
    }

    public function getTotalEarningCurrentMonthAttribute()
    {
        $currentMonthStart = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        return $this->Arts()->with('OrderItems')
        ->whereBetween('created_at', [$currentMonthStart, $currentMonthEnd])
        ->get()
        ->flatMap(function ($art) {
            return $art->OrderItems;
        })
        ->sum(function ($orderItem) {
            return $orderItem->QUANTITY * $orderItem->PRICE_PER_ITEM;
        });
    }

    public function getSoldItems()
    {
        return OrderItem::whereHas('Art', function ($query) {
            $query->where('USER_ID', $this->USER_ID);
        })->get();
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
