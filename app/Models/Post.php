<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'cat_id',
        'image',
        'views'
    ];
    public function categorys()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
