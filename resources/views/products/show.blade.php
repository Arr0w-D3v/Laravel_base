@extends('layouts.default')

@section('content')

<h1 class="text-5xl font-semibold text-center text-gray-900 dark:text-white sm:text-6xl md:text-7xl">{{$title}}</h1>

<label for="name" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Name : {{$product->name}}</label>

<label for="price" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Price</label>
{{$product->price}}
<label for="description" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Description</label>
{{$product->description}}

<a href="{{route('products.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Back</a>


@endsection
