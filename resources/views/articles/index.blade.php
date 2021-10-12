<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Articles
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth
                        <a href="{{ route("articles.create") }}" class="btn btn-success">Add New Article</a>    
                    @endauth

                    {{-- Show Success Message --}}
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Full Text</th>
                                <th scope="col">Category</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Author</th>
                                <th scope="col">Date</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <th scope="row">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ Illuminate\Support\Str::limit( $article->full_text , 20) }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>
                                        @forelse ($article->tags as $tag)
                                            #{{ $tag->name }}
                                        @empty
                                            No Tags
                                        @endforelse
                                    </td>
                                    <td>{{ $article->user->name }}</td>
                                    <td>{{ $article->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('articles.show',$article->id) }}" class="btn btn-sm btn-primary">View</a>
                                        <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('articles.destroy',$article->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h3>No Articles yet</h3>
                            @endforelse
                        </tbody>
                    </table>

                    {!! $articles->links()  !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
