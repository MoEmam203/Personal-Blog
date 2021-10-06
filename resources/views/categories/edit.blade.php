<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Category
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

                    {{-- Store New Category --}}
                    <form action="{{ route('categories.update',$category->id) }}" method="post">
                        @csrf
                        @method("PUT")
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                        <input type="submit" class="btn btn-primary mt-3" value="Update Category">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>