<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total_money',
        'actual_total',
        'payment_method',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey:'user_id', ownerKey:'id');
    }

    public function order_detail()
    {
        return $this->hasOne(OrderDetail::class, foreignKey:'order_id', localKey:'id');
    }
}
