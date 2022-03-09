<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public const PUBLIC_STATUS = 1;
    public const PRIVATE_STATUS = 0;

    use HasFactory;

    protected $table = 'discounts';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'code',
        'condition',
        'reduce',
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
