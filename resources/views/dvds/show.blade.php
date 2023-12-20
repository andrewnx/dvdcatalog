@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-semibold mb-4">{{ $dvd->name }}</h1>

    <div class="mb-4">
        <img src="{{ $dvd->cover_image }}" alt="{{ $dvd->name }}" class="w-48 h-auto">
    </div>

    <div class="mb-4">
        <span class="font-semibold">Format:</span> {{ $dvd->format->name }}
    </div>

    <div class="mb-4">
        <span class="font-semibold">Type:</span> {{ $dvd->type->name }}
    </div>

    <div class="mb-4">
        <span class="font-semibold">Location:</span> {{ $dvd->location->name }}
    </div>

    <div class="mb-4">
        <span class="font-semibold">Rating:</span> {{ $dvd->rating }}
    </div>

    <div class="mb-4">
        <a href="{{ route('dvds.edit', $dvd) }}" class="bg-blue-500 text-white px-4 py-2">Edit</a>
        <form action="{{ route('dvds.destroy', $dvd) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2">Delete</button>
        </form>
    </div>
</div>
@endsection