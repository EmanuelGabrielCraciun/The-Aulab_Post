<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

class Article extends Model
{
use HasFactory, Searchable;
protected $fillable = ['title', 'subtitle', 'body', 'image','user_id','category_id','is_accepted'
];

public function user(){

    return $this->belongsTo(user::class);
}


public function category(){

    return $this->belongsTo(Category::class);
}
public function toSearchableArray(){
    return[
        'id'=>$this->id,
        'title'=>$this->title,
        'subtitle'=>$this->subtitle,
        'body'=>$this->body,
        'category'=> $this->category,
        
    ];
}
}