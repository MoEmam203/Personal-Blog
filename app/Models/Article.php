<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // declare table
    protected $table = "articles";

    // fillable fields
    protected $fillable = [
        "title",
        "full_text",
        "image",
        "category_id",
        "user_id"
    ];

    protected $hidden = 'pivot';

    // Relationships
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'article_tags')->withTimestamps();
    }
}
