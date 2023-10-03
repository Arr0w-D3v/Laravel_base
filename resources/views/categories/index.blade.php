@extends('layouts.default')

@section('content')
    <h1 class="text-5xl font-semibold text-center text-gray-900 dark:text-white sm:text-6xl md:text-7xl">{{ $title }}
    </h1>
    <a href="{{ route('products.create') }}"
        class="text-2xl font-semibold text-center text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Create Product</a>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Description</th>
                <th class="px-4 py-2">Films</th>
                <th class="px-4 py-2">Slug</th>
                <th class="px-4 py-2">Active</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="border px-4 py-2">{{ $category->name }}</td>
                    <td class="border px-4 py-2">{{ $category->description }}</td>
                    <td class="border px-4 py-2">
                        @foreach ($category->movies as $movie)
                            <a href="{{ route('movies.show', $movie->id) }}"
                                class="text-blue-600 hover:text-blue-900 mb-2 mr-2">{{ $movie->title }}</a>
                        @endforeach
                    </td>
                    <td class="border px-4 py-2">{{ $category->is_active }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('products.show', $category->id) }}"
                            class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                        <a href="{{ route('products.edit', $category->id) }}"
                            class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                        <form class="inline-block" action="{{ route('categories.destroy', $category->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
