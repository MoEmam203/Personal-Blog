@include("audience.layouts.head")
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
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <th scope="row" class="text-danger">{{ $article->id }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ Illuminate\Support\Str::limit( $article->full_text , 20) }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td class="text-danger">
                                        @forelse ($article->tags as $tag)
                                            #{{ $tag->name }}
                                        @empty
                                            No Tags
                                        @endforelse
                                    </td>
                                    <td class="text-primary">{{ $article->user->name }}</td>
                                    <td>{{ $article->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('audience.articles.show',$article->id) }}" class="btn btn-sm btn-primary">View</a>
                                    </td>
                                </tr>
                            @empty
                                <h3>No Articles yet</h3>
                            @endforelse
                        </tbody>
                    </table>
                    {!! $articles->links()  !!}
@include("audience.layouts.footer")
