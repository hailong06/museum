<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public const BLOG_PUBLIC = 'public';
    public const BLOG_PRIVATE = 'private';
    use HasFactory;

    protected $table = 'blogs';

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'image',
        'sumary',
        'content',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, foreignKey:'user_id', ownerKey:'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, foreignKey:'category_id', ownerKey:'id');
    }
}
