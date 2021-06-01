<?php

use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function () {
    // Rutas para el flujo de Instituciones
    Route::get('obtener-instituciones', [InstitutionController::class, 'GetInstitutions']);
    Route::get('obtener-institucion/{id}', [InstitutionController::class, 'GetInstitution']);
    Route::post('agregar-institucion', [InstitutionController::class, 'CreateInstitution']);
    Route::put('actualizar-institucion/{id}', [InstitutionController::class, 'UpdateInstitution']);
    Route::delete('eliminar-institucion/{id}', [InstitutionController::class, 'DeleteInstitution']);

    // Rutas para el flujo de Mascotas
    Route::get('obtener-mascotas', [PetController::class, 'GetPets']);
    Route::get('obtener-mascota/{id}', [PetController::class, 'GetPet']);
    Route::post('agregar-mascota', [PetController::class, 'CreatePet']);
    Route::put('actualizar-mascota/{id}', [PetController::class, 'UpdatePet']);
    Route::delete('eliminar-mascota/{id}', [PetController::class, 'DeletePet']);

});