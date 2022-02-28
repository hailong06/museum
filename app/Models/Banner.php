<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public const BANNER_PUBLIC = 1;
    public const BANNER_PRIVATE = 0;

    use HasFactory;

    protected $table = 'banners';

    protected $fillable = [
        'user_id',
        'name',
        'image',
        'description',
        'status',
        'link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey:'user_id', ownerKey:'id');
    }
}
