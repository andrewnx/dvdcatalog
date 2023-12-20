<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $type = new Type([
            'name' => $request->name,
        ]);

        $type->save();

        return redirect()->route('types.index')->with('success', 'Type created successfully');
    }

    public function show(Type $type)
    {
        return view('types.show', compact('type'));
    }

    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $type->update([
            'name' => $request->name,
        ]);

        return redirect()->route('types.index')->with('success', 'Type updated successfully');
    }

    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('types.index')->with('success', 'Type deleted successfully');
    }
}
