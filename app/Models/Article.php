<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
use HasFactory, Searchable;
protected $fillable = ['title', 'subtitle', 'body', 'image','user_id','category_id','is_accepted','slug'
];
public function getRouteKeyName()
{
    return 'slug'; 
}

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
public function tags(){
    return $this->belongsToMany(Tag::class);
}

public function readDuration(){
$totlaWords = Str::wordCount($this->body);
$minuteToRead = round($totlaWords /150);
return intval($minuteToRead);
}

}