<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use App\Http\Requests\StorePrecioRequest;
use App\Http\Requests\UpdatePrecioRequest;
use Illuminate\Http\Response;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $precios = Precio::all();

        return response()->json(['data' => $precios, 'status' => Response::HTTP_OK], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrecioRequest $request)
    {
        $precio = Precio::create($request->all());

        return response()->json([
            'message' => 'El precio ha sido creado corectamente',
            'data' => $precio,
            'status' => Response::HTTP_CREATED
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Precio $precio)
    {
        return $precio;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrecioRequest $request, Precio $precio)
    {
        $precio->update($request->all());

        return response()->json([
            'message' => 'El precio actualizado correctamente',
            'data' => $precio,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Precio $precio)
    {
        $precio->delete();

        return response()->json([
            'message' => 'El precio ha sido eliminado correctamente',
            'data' => $precio,
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }
}
