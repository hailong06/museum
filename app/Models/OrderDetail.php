<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    protected $table = 'order_details';

    protected $fillable = [
        'order_id',
        'ticket_id',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, foreignKey:'order_id', ownerKey:'id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, foreignKey:'ticket_id', ownerKey:'id');
    }
}
