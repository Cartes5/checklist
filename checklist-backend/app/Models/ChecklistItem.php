<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'completado']; // Lista de atributos que se pueden asignar masivamente

    // Otros métodos, relaciones o lógica del modelo aquí
}
