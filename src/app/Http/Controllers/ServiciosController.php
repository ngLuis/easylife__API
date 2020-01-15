<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicios;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorio = scandir(storage_path('app/public/servicios/'));
        $bd = Servicios::all();
        $data = array();
        $status = 404;
        $code = 'Services Not Found';

        for ($i=0; $i < count($bd); $i++) {
            $contenidoValido['id'] = $bd[$i]['id'];
            $contenidoValido['nombre'] = $bd[$i]['nombre'];
            $contenidoValido['idCategoria'] = $bd[$i]['categoria_id'];
            $contenidoValido['precio'] = $bd[$i]['precio'];
            $contenidoValido['descripcion'] = $bd[$i]['descripcion'];
            $contenidoValido['imagen'] = 'imagenotfoundserv.png';

            if (in_array($bd[$i]['imagen'], $directorio)){
                $contenidoValido['imagen'] = $bd[$i]['imagen'];
            }
            array_push($data, $contenidoValido);
        }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Servicios::find($id);

        $status = 404;
        $code = 'Services Not Found';

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
