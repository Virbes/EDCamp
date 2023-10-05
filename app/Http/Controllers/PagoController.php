<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Http\Requests\StorePagoRequest;
use App\Http\Requests\UpdatePagoRequest;
use Illuminate\Http\Response;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pago = Pago::all(['*']);

        return response()->json([
            'data' => $pago,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePagoRequest $request)
    {
        $pago = Pago::create($request->all());

        return response()->json([
            'message' => 'El pago a sido creada correctamente',
            'data' => $pago,
            'status' => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        return response()->json([
            'data' => $pago,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePagoRequest $request, Pago $pago)
    {
        $pago->update($request->all());

        return response()->json([
            'message' => 'El pago se ha actualizado correctamente',
            'data' => $pago,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        $pago->delete();

        return response()->json([
            'message' => 'El pago se ha eliminado correctamente',
            'data' => $pago,
            'status' =>Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
