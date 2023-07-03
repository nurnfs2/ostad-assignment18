<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public static function getPostsCountByCategory($categoryId)
    {
        return self::where('category_id', $categoryId)->count();
    }


    public static function getSoftDeletedPosts()
    {
        return self::withTrashed()->whereNotNull('deleted_at')->get();
    }




}
