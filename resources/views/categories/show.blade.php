<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Category Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-primary">Category Name: {{ $category->name }}</h3>
                    <p>Created at: {{ $category->created_at->diffForHumans() }}</p>

                    <a href="{{ route("categories.index") }}" class="btn btn-sm btn-primary">Return To All categories</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>