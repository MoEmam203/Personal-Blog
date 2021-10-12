<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Article Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Title : {{ $article->title }}</h1>
                    <div class="row">
                        <div class="col-9">
                            <blockquote>
                                "{{ $article->full_text }}"
                            </blockquote>
                        </div>
                        <div class="col-3">
                            <img src="{{ asset($article->image ? "storage/images/articles/".$article->id."/".$article->image : "Storage/images/no-image.png") }}"/>
                        </div>
                    </div>

                    <label class="form-label">Tags:</label>
                    @forelse ($article->tags as $tag )
                        <span class="text-danger">#{{ $tag->name }}</span>
                    @empty
                        No tags
                    @endforelse

                    <p>Author: {{ $article->user->name }}</p>
                    <p>Date : {{ $article->created_at->diffForHumans() }}</p>

                    <a href="{{ route("articles.index") }}" class="btn btn-sm btn-primary">Return To All Articles</a>
                    <a href="{{ route("articles.edit",$article->id) }}" class="btn btn-sm btn-info">Edit Article</a>
                    <form action="{{ route('articles.destroy',$article->id) }}" method="post" class="d-inline">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete Article">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>