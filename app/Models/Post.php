<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // mendefinisikan field yang boleh d isi
    protected $fillable = ['title', 'content', 'category_id', 'user_id', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // Relasi ke Gallery
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    
}