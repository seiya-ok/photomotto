<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'photo_file',
        'description',
        'location',
        'tag',
        'date_taken',
        'camerabody',
        'cameralens',
        'camerasoft',
       
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function getByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    public function getPaginateByLimit(int $limit_count = 10)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->withCount('likes')->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
   public function likes()
{
    return $this->hasMany('App\Models\Like');
}

// 実装2
// Viewで使う、いいねされているかを判定するメソッド。
public function isLikedBy($user): bool {
    return Like::where('user_id', $user->id)->where('photo_id', $this->id)->first() !==null;
}
}
