<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'user_id',
        'discount_id',
        'name',
        'price',
        'price_sale',
        'status',
        'description',
        'date_time',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey:'user_id', ownerKey:'id');
    }

    public function discount()
    {
        return $this->belongsTo(Discount::class, foreignKey:'discount_id', ownerKey:'id');
    }
    public function order_detail()
    {
        return $this->hasOne(Order_detail::class, foreignKey:'order_id', localKey:'id');
    }
}
