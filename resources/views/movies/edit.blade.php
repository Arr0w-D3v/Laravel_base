@extends('layouts.default')

@section('content')

<h1 class="text-5xl font-semibold text-center text-gray-900 dark:text-white sm:text-6xl md:text-7xl">{{$title}}</h1>


<form action="{{route('movies.update', $movie->id)}}" method="POST" >
    @csrf
    @method('PUT')
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col justify-center items-center">
            <label for="name" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Name</label>
            <input type="text" name="title" id="title" class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl" value="{{$movie->title}}">
            @error('title')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="category_id" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Category</label>
            <select name='category_id' id='category_id' class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl">
                @foreach ($categories as $category)
                <option value="{{$category->id}}" @if($category->id === $movie->category_id) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="actors" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Actors</label>
            <select name='actors[]' id='actors' multiple class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl">
                @foreach ($actors as $actor)
                <option value="{{$actor->id}}" {{ in_array($actor->id, old('cats') ?: $movie->actors->pluck('id')->all()) ? 'selected' : '' }} >{{$actor->firstname}} {{$actor->lastname}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="description" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="w-96 h-96 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl">
                {{$movie->description}}
            </textarea>
            @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-
        4 rounded mt-4">Update</button>
    </div>
</form>
    
    {{-- @stop --}}

@endsection
