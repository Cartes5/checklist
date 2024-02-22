<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ChecklistItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/checklists', [ChecklistController::class, 'index']);
Route::post('/checklists', [ChecklistController::class, 'store']);
Route::get('/checklists/{id}', [ChecklistController::class, 'show']);
Route::put('/checklists/{id}', [ChecklistController::class, 'update']);
Route::delete('/checklists/{id}', [ChecklistController::class, 'destroy']);

Route::get('/checklist-items', [ChecklistItemController::class, 'index']);
Route::post('/checklist-items', [ChecklistItemController::class, 'store']);
Route::get('/checklist-items/{id}', [ChecklistItemController::class, 'show']);
Route::put('/checklist-items/{id}', [ChecklistItemController::class, 'update']);
Route::delete('/checklist-items/{id}', [ChecklistItemController::class, 'destroy']);



