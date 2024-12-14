<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'ORDER';
    protected $primaryKey = 'ORDER_ID';
    protected $fillable = ['USER_ID', 'PAYMENT','FULLNAME', 'PHONE', 'ADDRESS', 'PROVINCE', 'CITY', 'POSTAL_CODE','STATUS'];

    // STATUS
    // 1 = NEW
    // 2 = PAID
    // 3 = IN DELIVERY
    // 3 = DELIVERED

    public function getStatusTextAttribute()
    {
        $statuses = [
            1 => 'NEW',
            2 => 'PAID',
            3 => 'IN DELIVERY',
            4 => 'DELIVERED',
        ];

        return $statuses[$this->STATUS] ?? 'UNKNOWN';
    }

    public function getTotalPriceAttribute()
    {
        $subtotal = $this->orderItems->sum('PRICE_PER_ITEM');
        $total = $subtotal + 50000;
        return $total;
    }

    public function MasterUser(): BelongsTo
    {
        return $this->belongsTo(MasterUser::class, 'USER_ID', 'USER_ID');
    }

    public function OrderItems(): hasMany
    {
        return $this->hasMany(OrderItem::class, 'ORDER_ID', 'ORDER_ID');
    }
}
