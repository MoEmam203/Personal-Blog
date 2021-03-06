<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{ route("categories.create") }}" class="btn btn-success">Add New Category</a>
                    
                    {{-- Show Success Message --}}
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    
                    {{-- Show Categories details --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <th scope="row" class="text-danger">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('categories.show',$category->id) }}" class="btn btn-sm btn-primary">View</a>
                                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('categories.destroy',$category->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h3>No Categories yet</h3>
                            @endforelse
                        </tbody>
                    </table>

                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
