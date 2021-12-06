<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = [
        'user_id',
        'code',
        'percent',
        'start',
        'end',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey:'user_id', ownerKey:'id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, foreignKey:'discount_id', localKey:'id');
    }
}
