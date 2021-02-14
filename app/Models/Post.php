<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, SoftDeletes};

class Post extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'posts';
    protected $fillable = [
        'body',
//        'user_id'
    ];
    protected $perPage = 20;

    //untuk mengecek apakah user sudah like atau belom
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    //hanya bisa menghapus data yang di buat oleh user pembuat
    //sudah di alihkan menggunakan policy
//    public function ownedBy(User $user)
//    {
//        return $user->id === $this->user_id;
//    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
//        return $this->hasMany(Like::class, 'post_id', 'id');
        return $this->hasMany(Like::class, 'post_id', 'id');
    }


}
