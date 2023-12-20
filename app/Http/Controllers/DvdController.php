<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Models\Format;
use App\Models\Type;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Services\OpenMovieDBService;

class DvdController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $typeFilter = $request->get('type_id');

        $query = Dvd::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($typeFilter) {
            $query->where('type_id', $typeFilter);
        }

        $dvds = $query->paginate(6)->appends(['search' => $search, 'type_id' => $typeFilter]);

        $types = Type::all();

        return view('dvds.index', compact('dvds', 'types'));
    }

    public function create()
    {
        $formats = Format::all();
        $types = Type::all();
        $locations = Location::all();

        return view('dvds.create', compact('formats', 'types', 'locations'));
    }

    public function store(Request $request, OpenMovieDBService $omdbService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'format_id' => 'required|integer|exists:formats,id',
            'type_id' => 'required|integer|exists:types,id',
            'location_id' => 'required|integer|exists:locations,id',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $movieData = $omdbService->searchByTitle($request->name);

        $dvd = new Dvd([
            'name' => $request->name,
            'format_id' => $request->format_id,
            'type_id' => $request->type_id,
            'location_id' => $request->location_id,
            'rating' => $request->rating,
            'cover_image' => $movieData['Poster'] ?? null,
        ]);

        $dvd->save();

        return redirect()->route('dvds.index')->with('success', 'Dvd created successfully');
    }

    public function show(Dvd $dvd)
    {
        return view('dvds.show', compact('dvd'));
    }

    public function edit(Dvd $dvd)
    {
        $formats = Format::all();
        $types = Type::all();
        $locations = Location::all();

        return view('dvds.edit', compact('dvd', 'formats', 'types', 'locations'));
    }

    public function update(Request $request, Dvd $dvd, OpenMovieDBService $omdbService)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'format_id' => 'required|integer|exists:formats,id',
            'type_id' => 'required|integer|exists:types,id',
            'location_id' => 'required|integer|exists:locations,id',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $movieData = $omdbService->searchByTitle($request->name);

        $dvd->update([
            'name' => $request->name,
            'format_id' => $request->format_id,
            'type_id' => $request->type_id,
            'location_id' => $request->location_id,
            'rating' => $request->rating,
            'cover_image' => $movieData['Poster'] ?? $dvd->cover_image,
        ]);

        return redirect()->route('dvds.index')->with('success', 'Dvd updated successfully');
    }

    public function destroy(Dvd $dvd)
    {
        $dvd->delete();
        return redirect()->route('dvds.index')->with('success', 'Dvd deleted successfully');
    }
}
