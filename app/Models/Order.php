<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'ORDER';
    protected $primaryKey = 'ORDER_ID';
    protected $fillable = ['USER_ID', 'ART_ID', 'QUANTITY','PRICE_PER_ITEM','STATUS'];

    // STATUS
    // 1 = NEW
    // 2 = PAID
    // 3 = DELIVERED

    public function MasterUser(): BelongsTo
    {
        return $this->belongsTo(MasterUser::class, 'USER_ID', 'USER_ID');
    }

    public function Art(): BelongsTo
    {
        return $this->belongsTo(Art::class, 'ART_ID', 'ART_ID');
    }
}
