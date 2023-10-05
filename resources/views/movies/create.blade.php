@extends('layouts.default')

@section('content')
<h1 class="text-5xl font-semibold text-center text-gray-900 dark:text-white sm:text-6xl md:text-7xl">{{$title}}</h1>
<form action="{{route('movies.store')}}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col justify-center items-center">
            <label for="name" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">title</label>
            <input type="text" name="title" id="title" class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl" value="{{old('title')}}">
            @error('name')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="price" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Category</label>
            <select name='category_id' id='category_id' class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col justify-center items-center">
            <label for="actors" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">actors</label>
            <select name='actors[]' id='actors' multiple class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl">
                @foreach ($actors as $actor)
                <option value="{{$actor->id}}">{{$actor->firstname}} {{$actor->lastname}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="description" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="w-96 h-96 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl">
                {{old('description')}}
            </textarea>
            @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Create</button>
    </div>
</form>

{{-- @stop --}}

@endsection
