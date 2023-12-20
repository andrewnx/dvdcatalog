@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-xl font-semibold mb-4">Dvds</h1>

    <div class="mb-4">
        <form action="{{ route('dvds.index') }}" method="GET" class="flex">
            <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                class="border border-gray-300 p-2 flex-grow">
            <select name="filter" class="border border-gray-300 p-2" onchange="this.form.submit()">
                <option value="">Filter by Type</option>
                @foreach($types as $type)
                <option value="{{ $type->id }}" {{ request('filter')==$type->id ? 'selected' : '' }}>{{ $type->name }}
                </option>
                @endforeach
            </select>
        </form>
    </div>

    <div class="grid grid-cols-3 gap-4">
        @foreach($dvds as $dvd)
        <div class="bg-gray-900 shadow p-4 rounded-lg">
            <img src="{{ $dvd->cover_image }}" alt="{{ $dvd->name }}"
                class="w-full h-auto object-cover mb-4 rounded-lg">
            <h2 class="text-lg font-semibold mb-2 text-white">{{ $dvd->name }}</h2>
            <p class="text-gray-300">Type: {{ $dvd->type->name }}</p>
            <p class="text-gray-300">Format: {{ $dvd->format->name }}</p>
            <p class="text-gray-300">Location: {{ $dvd->location->name }}</p>
            <p class="text-gray-300">Number of Discs: {{ $dvd->number_of_discs }}</p>
            <p class="text-gray-300"><a href="{{ $dvd->official_website }}" target="_blank"
                    class="text-blue-400 hover:text-blue-600">Official Website</a></p>
            <p class="text-gray-300"><a href="{{ $dvd->imdb_link }}" target="_blank"
                    class="text-blue-400 hover:text-blue-600">IMDb Link</a></p>
            <p class="text-gray-300">Number of Episodes: {{ $dvd->number_of_episodes ?? 'N/A' }}</p>


            <a href="{{ route('dvds.show', $dvd) }}" class="text-blue-500">View Details</a>
        </div>
        @endforeach
    </div>

    <div class="flex flex-col items-center my-4">
        <div class="flex">
            {{ $dvds->links() }}
        </div>
    </div>

    @endsection