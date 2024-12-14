<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Art extends Model
{
    use HasFactory;

    protected $table = 'ART';
    protected $primaryKey = 'ART_ID';
    protected $fillable = ['USER_ID', 'ART_TITLE', 'DESCRIPTION', 'VIEW', 'IS_SALE', 'PRICE'];

    public function MasterUser(): BelongsTo
    {
        return $this->belongsTo(MasterUser::class, 'USER_ID', 'USER_ID');
    }

    public function ArtCategories(): HasMany
    {
        return $this->hasMany(ArtCategory::class, 'ART_ID', 'ART_ID');
    }

    public function ArtLikes(): HasMany
    {
        return $this->hasMany(ArtLike::class, 'ART_ID', 'ART_ID');
    }

    public function ArtImages(): HasMany
    {
        return $this->hasMany(ArtImage::class, 'ART_ID', 'ART_ID');
    }

    public function ArtCollection(): HasOne
    {
        return $this->hasOne(ArtCollection::class, 'ART_ID', 'ART_ID');
    }

    public function Carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'ART_ID', 'ART_ID');
    }

    public function OrderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'ART_ID', 'ART_ID');
    }
}
