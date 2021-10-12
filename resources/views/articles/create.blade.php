<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add new article
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Show Error Messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route("articles.store") }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control mb-3">

                        <label for="full_text" class="form-label">Full Text</label>
                        <textarea name="full_text" class="form-control" cols="30" rows="10"></textarea>

                        <input type="file" name="image" class="form-control my-3">

                        <select name="category_id" class="form-select form-select mb-3">
                            <option value="0" selected>Choose Category</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @empty
                                <option>No Categories</option>
                            @endforelse
                        </select>

                        <label class="form-label d-block">Tags:</label>
                        @forelse ($tags as $tag)
                            <input type="checkbox" name="tag[]" value="{{ $tag->id }}" class="form-check-input ms-2">
                            <label class="form-check-label" for="tag[]">
                                #{{ $tag->name }}
                            </label>
                        @empty
                            No Tags
                        @endforelse

                        <input type="submit" class="btn btn-primary mt-3 d-block" value="Save Article">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
