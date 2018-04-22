<?php

namespace App\Models;

use App\Models\User;
use App\MyModel;

class News extends MyModel
{
    const STATUS_PUBLISH = 1;
    const STATUS_PENDING = 0;
    protected $table     = "news";

    protected $fillable = [
        'title',
        'slug',
        'image',
        'excerpt',
        'content',
        'user_id',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function news() {
        return self::orderBy('id', 'desc')->limit(3)->with('user')->get();
    }
}
