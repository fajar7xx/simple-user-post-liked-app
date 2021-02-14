<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory, Model, SoftDeletes};

class Like extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'likes';
    protected $fillable = [
        'user_id',
        'post_id'
    ];

    //relasi
}
