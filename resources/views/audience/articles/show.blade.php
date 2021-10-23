@include("audience.layouts.head")
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

                    <a href="{{ route("audience.articles.index") }}" class="btn btn-sm btn-primary">Return To All Articles</a>
@include("audience.layouts.footer")