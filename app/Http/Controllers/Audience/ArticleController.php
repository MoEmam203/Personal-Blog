<?php

namespace App\Http\Controllers\Audience;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::with('tags','category')->paginate(PAGINATE_NUMBER);
        return view("audience.articles.index")->with("articles",$articles);
    }

    public function show(Article $article){
        return view("audience.articles.show")->with("article",$article);
    }
}
