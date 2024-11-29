<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
use HasFactory;
protected $fillable = ['title', 'subtitle', 'body', 'image','user_id','category_id'
];

public function user(){

    return $this->blongsTo(user::class);
}


public function category(){

    return $this->belongsTo(Category::class);
}
}
