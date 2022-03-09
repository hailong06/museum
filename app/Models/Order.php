<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public $timestamps = true;

    protected $fillable = [
        'code_order',
        'custumer_name',
        'custumer_email',
        'custumer_phone',
        'total_money',
        'actual_total',
        'payment_method',
        'discount_id',
        'date',
        'status',
    ];

    public function order_detail()
    {
        return $this->hasOne(OrderDetail::class, foreignKey:'order_id', localKey:'id');
    }
}
