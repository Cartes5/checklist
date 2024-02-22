<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChecklistItem;

class ChecklistItemController extends Controller
{
    public function index()
    {
        $checklistItems = ChecklistItem::all();
        return response()->json($checklistItems);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $checklistItem = ChecklistItem::create($validatedData);

        return response()->json($checklistItem, 201);
    }

    public function show($id)
    {
        $checklistItem = ChecklistItem::findOrFail($id);
        return response()->json($checklistItem);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $checklistItem = ChecklistItem::findOrFail($id);
        $checklistItem->update($validatedData);

        return response()->json($checklistItem, 200);
    }

    public function destroy($id)
    {
        $checklistItem = ChecklistItem::findOrFail($id);
        $checklistItem->delete();

        return response()->json(null, 204);
    }
}
