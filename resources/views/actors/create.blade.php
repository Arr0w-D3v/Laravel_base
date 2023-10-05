@extends('layouts.default')

@section('content')
<h1 class="text-5xl font-semibold text-center text-gray-900 dark:text-white sm:text-6xl md:text-7xl">{{$title}}</h1>
<form action="{{route('actors.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col justify-center items-center">
        <div class="flex flex-col justify-center items-center">
            <label for="name" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Name</label>
            <input type="text" name="lastname" id="lastname" class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl" value="{{old('lastname')}}">
            @error('lastname')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="name" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Firstname</label>
            <input type="text" name="firstname" id="firstname" class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl" value="{{old('firstname')}}">
            @error('firstname')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="price" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl" value="{{old('birthdate')}}">
            @error('birthdate')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="flex flex-col justify-center items-center">
            <label for="name" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="w-96 h-16 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl" value="{{old('nationality')}}">
            @error('nationality')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div>
        {{-- <div class="flex flex-col justify-center items-center">
            <label for="description" class="text-2xl font-semibold text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="w-96 h-96 text-2xl font-semibold text-gray-900 dark:text-dark sm:text-3xl md:text-4xl">
                {{old('description')}}
            </textarea>
            @error('description')
            <div class="text-red-500 mt-2 text-sm">
                {{$message}}
            </div>
            @enderror
        </div> --}}
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Create</button>
    </div>
</form>

{{-- @stop --}}

@endsection
