<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitutionFormRequest;
use App\Models\Institution;

class InstitutionController extends Controller
{
    public function GetInstitutions()
    {
        $Institutions = Institution::all();
        return response()->json($Institutions, 200);
    }

    public function GetInstitution($id)
    {
        $institution = Institution::find($id);
        if (!$institution) {
            return response()->json(['message' => 'Institución no encontrada'], 404);
        }
        return response()->json($institution, 200);
    }

    public function CreateInstitution(InstitutionFormRequest $request, Institution $institution)
    {
        /*Los datos vienen previamente validados desde la clase InstitutionFormRequest
        Al ser tan pocos campos y no requerir de operaciones, se opta por create(),
        ingresar los datos previamente validados*/

        return response()->json($institution->create($request->validated()), 200);
    }

    public function UpdateInstitution(InstitutionFormRequest $request, Institution $institution, $id)
    {
        /*Los datos vienen previamente validados desde la clase InstitutionFormRequest
        Al ser tan pocos campos y no requerir de operaciones, se opta por update(),
        y actualizar los datos que sean previamente validados*/

        $institution = Institution::find($id);
        if (!$institution) {
            return response()->json(['message' => 'Institución no encontrada'], 404);
        }
        return response()->json($institution->update($request->validated()), 200);
    }

    public function DeleteInstitution($id)
    {
        $institution = Institution::find($id);
        if (!$institution) {
            return response()->json(['message' => 'Institución no encontrada'], 404);
        }
        return response()->json(['institution' => $institution->delete(), 'message' => 'Institución eliminada correctamente'], 200);
    }
}