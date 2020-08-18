<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * このお気に入りを所有するユーザ。（ Userモデルとの多対多の関係を正確に記述）
     */
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, 'user_favorites', 'micropost_id', 'user_id')->withTimestamps();
    }
}