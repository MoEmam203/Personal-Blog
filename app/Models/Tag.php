<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // declare table
    protected $table= "tags";

    // fillable fields
    protected $fillable = [
        "name"
    ];

    protected $hidden = 'pivot';

    public function articles(){
        return $this->belongsToMany(Article::class,'article_tags')->withTimestamps();
    }
}
