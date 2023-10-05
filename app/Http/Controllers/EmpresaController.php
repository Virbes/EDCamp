<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Response;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::all();

        return response()->json([
            'data' => $empresas,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmpresaRequest $request)
    {
        $empresa = Empresa::create($request->all());

        return response()->json([
            'message' => 'La empresa a sido creada correctamente',
            'data' => $empresa,
            'status' => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        return response()->json([
            'data' => $empresa,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, Empresa $empresa)
    {
        $empresa->update($request->all());

        return response()->json([
            'message' => 'La empresa se ha actualizado correctamente',
            'data' => $empresa,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return response()->json([
            'message' => 'la empresa se ha eliminado correctamente',
            'data' => $empresa,
            'status' =>Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
