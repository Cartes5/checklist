<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChecklistItem;

class ChecklistController extends Controller
{
    public function index()
    {
        $checklists = ChecklistItem::all();
        return response()->json($checklists);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255',
            // Puedes agregar más reglas de validación según sea necesario para otros campos del formulario
        ]);

        $checklist = ChecklistItem::create($validatedData);

        return response()->json($checklist, 201);
    }

    public function show($id)
    {
        $checklist = ChecklistItem::findOrFail($id);
        return response()->json($checklist);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descripcion' => 'required|string|max:255',
            // Puedes agregar más reglas de validación según sea necesario para otros campos del formulario
        ]);

        $checklist = ChecklistItem::findOrFail($id);
        $checklist->update($validatedData);

        return response()->json($checklist, 200);
    }

    public function destroy($id)
    {
        $checklist = ChecklistItem::findOrFail($id);
        $checklist->delete();

        return response()->json(null, 204);
    }
}

