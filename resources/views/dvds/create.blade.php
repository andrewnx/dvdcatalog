@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-semibold mb-4">Add Dvd</h1>
    <form action="{{ route('dvds.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block mb-2">Name</label>
            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2" required>
        </div>

        <div class="mb-4">
            <label for="format_id" class="block mb-2">Format</label>
            <select name="format_id" id="format_id" class="w-full border border-gray-300 p-2" required>
                <option value="">Select format</option>
                @foreach($formats as $format)
                <option value="{{ $format->id }}">{{ $format->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="type_id" class="block mb-2">Type</label>
            <select name="type_id" id="type_id" class="w-full border border-gray-300 p-2" required>
                <option value="">Select type</option>
                @foreach($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="location_id" class="block mb-2">Location</label>
            <select name="location_id" id="location_id" class="w-full border border-gray-300 p-2" required>
                <option value="">Select location</option>
                @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="rating" class="block mb-2">Rating</label>
            <input type="number" name="rating" id="rating" step="0.1" min="0" max="10"
                class="w-full border border-gray-300 p-2" required>
        </div>

        <div class="mb-4">
            <label for="cover_image" class="block mb-2">Cover Image URL</label>
            <input type="url" name="cover_image" id="cover_image" class="w-full border border-gray-300 p-2" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2">Add Dvd</button>
    </form>
</div>
@endsection