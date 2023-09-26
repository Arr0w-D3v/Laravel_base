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
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Active</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">{{ $product->description }}</td>
                    <td class="border px-4 py-2">{{ $product->price }} €</td>
                    <td class="border px-4 py-2">{{ $product->is_active }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('products.show', $product->id) }}"
                            class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                        <form class="inline-block" action="{{ route('products.destroy', $product->id) }}" method="POST"
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
