<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::paginate(PAGINATE_NUMBER);
        return view("tags.index")->with("tags",$tags);
    }

    public function show(Tag $tag){
        return view("tags.show")->with("tag",$tag);
    }

    public function create(){
        return view("tags.create");
    }

    public function store(TagRequest $request){
        Tag::create($request->validated());
        return redirect()->route("tags.index")->with("success","Tag Saved successfully");
    }

    public function edit(Tag $tag){
        return view("tags.edit")->with("tag",$tag);
    }

    public function update(TagRequest $request,Tag $tag){
        $tag->update($request->validated());
        return redirect()->route("tags.index")->with("success","Tag updated successfully");
    }

    public function destroy(Tag $tag){
        $tag->delete();
        return redirect()->route("tags.index")->with("success","Tag deleted successfully");
    }
}
