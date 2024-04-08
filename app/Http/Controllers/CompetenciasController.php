<?php

namespace App\Http\Controllers;

use App\Models\Competencias;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use LDAP\Result;

class CompetenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listado = Competencias::all();
        return response()->json($listado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $competencias = new Competencias();
            $competencias->Nombre = $request->Nombre;
            $competencias->save();

            // Si la creación fue exitosa, devuelve un mensaje de éxito
            return response()->json(['message' => 'OK'], 200);
        } catch (QueryException $e) {
            // Si ocurre un error en la base de datos, devuelve un mensaje de error
            return response()->json(['message' => 'Error en la base de datos'], 500);
        } catch (\Exception $e) {
            // Si ocurre otro tipo de error, devuelve un mensaje de error genérico
            return response()->json(['message' => 'Error interno del servidor'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function show(Competencias $competencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function edit(Competencias $competencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $actualizar = $request->except(['_token', '_method']);
            Competencias::where('id', $id)->update($actualizar);
            return response()->json(['message' => 'OK'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Competencias  $competencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competencias $id)
    {
        try {
            $id->delete(); // Utiliza el método delete() en la instancia del modelo
            return response()->json(['message' => 'OK'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
