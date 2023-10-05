@extends('layouts.default')

@section('content')
    <h1 class="text-5xl font-semibold text-center text-gray-900 dark:text-white sm:text-6xl md:text-7xl">{{ $title }}
    </h1>
    <a href="{{ route('actors.create') }}"
        class="text-2xl font-semibold text-center text-gray-900 dark:text-white sm:text-3xl md:text-4xl">Create Actors</a>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Lastname</th>
                <th class="px-4 py-2">Firstname</th>
                <th class="px-4 py-2">birthdate</th>
                <th class="px-4 py-2">nationality</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actors as $actor)
                <tr>
                    <td class="border px-4 py-2">{{ $actor->lastname }}</td>
                    <td class="border px-4 py-2">{{ $actor->firstname }}</td>
                    <td class="border px-4 py-2">{{ $actor->birthdate }}</td>
                    <td class="border px-4 py-2">{{ $actor->nationality }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('actors.show', $actor->id) }}"
                            class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                        <a href="{{ route('actors.edit', $actor->id) }}"
                            class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                        <form class="inline-block" action="{{ route('actors.destroy', $actor->id) }}" method="POST"
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
