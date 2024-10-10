<?php

namespace App\Http\Controllers;

use App\Models\TransportUnit;
use Illuminate\Http\Request;

class TransportUnitController extends Controller
{
    public function index()
    {
        return TransportUnit::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'type' => 'required|in:trailer,truck'
        ]);

        $transportUnit = TransportUnit::create($validated);

        return response()->json($transportUnit, 201);
    }

    public function filterByType($type)
    {
        if (!in_array($type, ['trailer', 'truck'])) {
            return response()->json(['error' => 'Invalid type'], 400);
        }

        return TransportUnit::where('type', $type)->get();
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        return TransportUnit::where('name', 'like', "%$query%")->get();
    }
}
