<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empresa;
use Illuminate\Http\Response;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all(['*']);

        return response()->json([
            'data' => $alumnos,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $alumno = Alumno::create($request->all());

        return response()->json([
            'message' => 'El alumno a sido creada correctamente',
            'data' => $alumno,
            'status' => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return response()->json([
            'data' => $alumno,
            'empresa' => Empresa::findOrFail($alumno->id),
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $alumno->update($request->all());

        return response()->json([
            'message' => 'El alumno se ha actualizado correctamente',
            'data' => $alumno,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return response()->json([
            'message' => 'El Alumno se ha eliminado correctamente',
            'data' => $alumno,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
