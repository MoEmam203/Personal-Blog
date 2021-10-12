<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::with('tags','category')->paginate(PAGINATE_NUMBER);
        return view("articles.index")->with("articles",$articles);
    }

    public function show(Article $article){
        return view("articles.show")->with("article",$article);
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();

        return view("articles.create",['categories' => $categories , "tags" => $tags]);
    }

    public function store(ArticleRequest $request, Article $article){
        $article = Article::create([
            "user_id" => auth()->user()->id,
            "title" => $request->title,
            "full_text" => $request->full_text,
            "category_id" => $request->category_id
        ]);

        if($request->hasFile("image")){
            $image = $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images/articles" , $article->id."/".$image ,'');
            $article->image = $image;
            $article->save();
        }

        $article->tags()->attach($request->tag === null ? [] : $request->tag);

        return redirect()->route("articles.index")->with("success","Article saved successfully");
    }

    public function edit(Article $article){
        $categories = Category::all();
        $tags = Tag::all();

        $tagIDS = [];
        foreach($article->tags as $tag){
            array_push($tagIDS,$tag->id);
        }

        return view("articles.edit",["categories"=>$categories,"tags"=>$tags,"article"=>$article,"tagIDs"=>$tagIDS]);
    }

    public function update(ArticleRequest $request,Article $article){
        // dd("images/articles/".$article->id."/".$article->image);
        $article->update($request->validated());

        $article->tags()->sync($request->tag === null ? [] : $request->tag);

        if($request->hasFile("image")){
            // Storage::disk('public')->delete("/images/articles/".$article->id."/".$article->image);
            Storage::deleteDirectory("images/articles/".$article->id);
            $image = $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images/articles" , $article->id."/".$image ,'');
            $article->image = $image;
            $article->save();
        }
        return redirect()->route("articles.index")->with("success","Article updated successfully");
    }

    public function destroy(Article $article){
        if($article->image){
            Storage::deleteDirectory("images/articles/".$article->id);
        }

        $article->tags()->detach();
        $article->delete();

        return redirect()->route("articles.index")->with("success","Article deleted successfully");
    }
}
