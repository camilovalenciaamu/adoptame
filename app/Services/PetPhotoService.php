<?php

namespace App\Services;

class PetPhotoService
{
    public function SavePetPhoto($request)
    {
        $photo = $request->file('photo');
        $destinationPath = 'images/pets/';
        $filename = time() . '-' . $request->name . $photo->getClientOriginalName();
        $request->file('photo')->move($destinationPath, $filename);
        $uploadedPhoto = $destinationPath . $filename;

        return $uploadedPhoto;
    }
}