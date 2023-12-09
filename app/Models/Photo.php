<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'photo_file',
        'description',
        'location',
        'tag',
        'date_taken',
    ];
    
    public function user()
    {
        return $this->belongTo(User::class, 'user_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
