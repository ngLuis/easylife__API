<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Servicio;
use App\Categoria;
use App\Http\Controllers\ImagesController;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorio = scandir(storage_path('app/public/servicios/'));
        $servicios = Servicio::all();
        $data = array();
        $status = 404;
        $code = 'Services Not Found';

        foreach ($servicios as $servicio) {
            $contenidoValido['id'] = $servicio['id'];
            $contenidoValido['nombre'] = $servicio['nombre'];
            $contenidoValido['idCategoria'] = $servicio['categoria_id'];
            $contenidoValido['precio'] = $servicio['precio'];
            $contenidoValido['descripcion'] = $servicio['descripcion'];
            $contenidoValido['imagen'] = 'imagenotfoundserv.png';

            if (in_array($servicio['imagen'], $directorio)){
                $contenidoValido['imagen'] = $servicio['imagen'];
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
        $imageController = new ImagesController();

        $data = new Servicio();

        $status = 200;
        $code = 'Cart created';
        

        $data->nombre = $request->input('nombre');
        $data->categoria_id = $request->input('categoria_id');
        $data->precio = $request->input('precio');
        $data->descripcion = $request->input('descripcion');

        $imagenName = $imageController->saveImage('/public/servicios', 'servicio', 'imagen', $request);

        $data->imagen = $imagenName;

        $data->save();

        return response()->json([
            "data" => $data,
            "status" => $status,
            "code" => $code
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
        $data = Servicio::find($id);

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

        $imageController = new ImagesController();
        
        $data = Servicio::find($id);

        $status = 404;
        $code = 'Service Not Found';

        if ( $data !== null ) {
            $data->nombre = $request->input('nombre');
            $data->categoria_id = $request->input('categoria_id');
            $data->precio = $request->input('precio');
            if ($request->input('imagen') !== null ) {
                $imagenName = $imageController->saveImage('/public/servicios', 'servicio', 'imagen', $request);
                $data->imagen = $imagenName;
            }

            $data->descripcion = $request->input('descripcion');

            $data->save();

            $status = 200;
            $code = 'Success';
        }

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
    }

    public function patchService(Request $request, $id) {

        $imageController = new ImagesController();

        $data = Servicio::find($id);

        $status = 404;
        $code = 'Service Not Found';

        if ( $data !== null ) {
            $data->nombre = $request->input('nombre');
            $data->categoria_id = $request->input('categoria_id');
            $data->precio = $request->input('precio');

            $imagenName = $imageController->saveImage('/public/servicios', 'servicio', 'imagen', $request);
            $data->imagen = $imagenName;

            $data->descripcion = $request->input('descripcion');

            $data->save();

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Servicio::find($id);

        $status = 404;
        $code = 'Services Not Found';

        if ( $data !== null ) {
            $data->delete();
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
