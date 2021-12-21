<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public const CATEGORY_PUBLIC = 1;
    public const CATEGORY_PRIVATE = 0;
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'user_id',
        'name',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey:'user_id', ownerKey:'id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, foreignKey:'category_id', localKey:'id');
    }
}
