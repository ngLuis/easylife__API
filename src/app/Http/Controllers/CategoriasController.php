<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorias;
use App\Servicios;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categorias::all();
        $status = 404;
        $code = 'Categories Not Found';

        if ( count($data) !== 0 ) {
            $status = 200;
            $code = 'Success';
        }

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
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
        $data = new Categorias();

        $data->nombre = $request->input('nombre');
        $data->descripcion = $request->input('descripcion');
        $data->imagen = $request->input('imagen');

        $data->save();

        $status = 200;
        $code = 'Category created';

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Categorias::find($id);

        $status = 404;
        $code = 'Category Not Found';

        if ( $data !== null ) {
            $status = 200;
            $code = 'Success';
        }

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Categorias::find($id);

        $status = 404;
        $code = 'Category Not Found';

        if ( $data !== null ) {
            $data->nombre = $request->input('nombre');
            $data->descripcion = $request->input('descripcion');
            $data->imagen = $request->input('imagen');

            $data->save();

            $status = 200;
            $code = 'Category Updated';
        }

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categorias::find($id);

        $status = 404;
        $code = 'Category Not Deleted';

        if ( $data !== null ) {
            $status = 200;
            $code = 'Category Deleted';

            try {
                $data->delete();
            } catch (\Illuminate\Database\QueryException $exception) {
                $status = 500;
                $code = 'Foreign Key Constraint';
            }

        }

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
    }

    public function getServicios($idServicio){
        $servicio = new Servicios();

        $data = $servicio->getServiciosPorCategoria($idServicio);
        $status = 404;
        $code = 'Services Not Found';

        if ( count($data) !== 0 ) {
            $status = 200;
            $code = 'Success';
        }

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
    }
}
