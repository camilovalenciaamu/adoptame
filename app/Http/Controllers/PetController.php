<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetFormRequest;
use App\Models\Pet;
use App\Services\PetPhotoService;

class PetController extends Controller
{
    public function GetPets()
    {
        $Pets = Pet::all();
        return response()->json($Pets, 200);
    }

    public function GetPet($id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Mascota no encontrada'], 404);
        }
        return response()->json($pet, 200);
    }

    public function CreatePet(PetFormRequest $request, PetPhotoService $photo)
    {
        //Los datos vienen previamente validados desde la clase PetFormRequest
        $newPet = new Pet();
        if ($request->hasFile('photo')) {
            $newPet->photo = $photo->SavePetPhoto($request);

        }
        $newPet->name = $request->name;
        $newPet->specie = $request->specie;
        $newPet->race = $request->race;
        $newPet->date_of_birth = $request->date_of_birth;
        $newPet->institution_id = $request->institution_id;
        $newPet->save();

        return response()->json(['mascota' => $newPet], 200);
    }

    public function UpdatePet(PetFormRequest $request, PetPhotoService $photo, $id)
    {
        //Los datos vienen previamente validados desde la clase PetFormRequest

        $updatePet = Pet::find($id);
        if (!$updatePet) {
            return response()->json(['message' => 'Mascota no encontrada'], 404);
        }

        if ($request->hasFile('photo')) {
            $updatePet->photo = $photo->SavePetPhoto($request);
        }
        $updatePet->name = $request->has('name') ? $request->get('name') : $updatePet->name;
        $updatePet->specie = $request->has('specie') ? $request->get('specie') : $updatePet->specie;
        $updatePet->race = $request->has('race') ? $request->get('race') : $updatePet->race;
        $updatePet->date_of_birth = $request->has('date_of_birth') ? $request->get('date_of_birth') : $updatePet->date_of_birth;
        $updatePet->institution_id = $request->has('institution_id') ? $request->get('institution_id') : $updatePet->institution_id;

        $updatePet->save();

        return response()->json(['mascota' => $updatePet], 200);

    }

    public function DeletePet($id)
    {
        $pet = Pet::find($id);
        if (!$pet) {
            return response()->json(['message' => 'Mascota no encontrada'], 404);
        }
        return response()->json(['pet' => $pet->delete(), 'message' => 'Mascota eliminada correctamente'], 200);
    }
}