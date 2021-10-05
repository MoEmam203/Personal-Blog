<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // declare table
    protected $table= "categories";

    // fillable fields
    protected $fillable = [
        "name"
    ];

    // Relationships
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
