<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function index()
    {
        $formats = Format::all();
        return view('formats.index', compact('formats'));
    }

    public function create()
    {
        return view('formats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $format = new Format([
            'name' => $request->name,
        ]);

        $format->save();

        return redirect()->route('formats.index')->with('success', 'Format created successfully');
    }

    public function show(Format $format)
    {
        return view('formats.show', compact('format'));
    }

    public function edit(Format $format)
    {
        return view('formats.edit', compact('format'));
    }

    public function update(Request $request, Format $format)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $format->update([
            'name' => $request->name,
        ]);

        return redirect()->route('formats.index')->with('success', 'Format updated successfully');
    }

    public function destroy(Format $format)
    {
        $format->delete();
        return redirect()->route('formats.index')->with('success', 'Format deleted successfully');
    }
}
