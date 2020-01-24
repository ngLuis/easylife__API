<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;
use App\Servicio;


class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorio = scandir(storage_path('app/public/categorias/'));
        $categorias = Categoria::all();
        $data = array();
        $status = 404;
        $code = 'Categories Not Found';

        foreach ($categorias as $categoria) {
            $contenidoValido['id'] = $categoria['id'];
            $contenidoValido['nombre'] = $categoria['nombre'];
            $contenidoValido['descripcion'] = $categoria['descripcion'];
            $contenidoValido['imagen'] = 'imagenotfoundcat.png';

            if (in_array($categoria['imagen'], $directorio)){
                $contenidoValido['imagen'] = $categoria['imagen'];
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
        $data = new Categoria();

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
        $data = Categoria::find($id);

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
        $data = Categoria::find($id);

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
        $data = Categoria::find($id);
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

    public function getServicios($idCategoria){

        $directorio = scandir(storage_path('app/public/servicios/'));

        $serviciosCategoria = Categoria::find($idCategoria)->servicios;
        $status = 404;
        $data = array();
        $code = 'Services Not Found';

        foreach ($serviciosCategoria as $rows) {
            $contenidoValido['id'] = $rows->id;
            $contenidoValido['nombre'] = $rows->nombre;
            $contenidoValido['idCategoria'] = $rows->categoria_id;
            $contenidoValido['precio'] = $rows->precio;
            $contenidoValido['descripcion'] = $rows->descripcion;
            $contenidoValido['imagen'] = 'imagenotfoundserv.png';

            if (in_array($rows->imagen, $directorio)){
                $contenidoValido['imagen'] = $rows->imagen;
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
}
