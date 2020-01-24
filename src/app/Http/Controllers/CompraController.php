<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Compra;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorio = scandir(storage_path('app/public/servicios/'));
        $db = Compra::all();
        $data = array();
        $status = 404;
        $code = 'Purchases not found';

        for($i = 0; $i < count($db); $i ++) {
            $contenidoCompra['id'] = $db[$i]['id'];
            $contenidoCompra['servicio_id'] = $db[$i]['servicio_id'];
            $contenidoCompra['user_id'] = $db[$i]['user_id'];
            $contenidoCompra['tipo'] = $db[$i]['tipo'];
            array_push($data, $contenidoCompra);
        }

        if (count($data) !== 0) {
            $status = 200;
            $code = 'Success';
        }

        return response()->json([
            'data' => $data,
            'status' => $status,
            'code' => $code        
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
        $data = new Compra();

        $data->servicio_id = $request->input('servicio_id');
        $data->user_id = $request->input('user_id');
        $data->tipo = $request->input('tipo');

        $data->save();

        $status = 200;
        $code = "Purchase made";

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
        $data = Compra::find($id);

        $status = 404;
        $code = 'Purchase not found';

        if ($data !== null) {
            $status = 200;
            $code = 'Success';
        }

        return response()->json([
            'data' => $data,
            'status' => $status,
            'code' => $code
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
        $data = Compra::find($id);
        $status = 404;
        $code = 'Purchase not found';

        if ($data !== null) {
            $status = 200;
            $code = 'Purchase removed';

            try {
                $data->delete();
            } catch (\Illuminate\Database\QueryException $exception) {
                $status = 500;
                $code = 'Error server';
            }
        }

        return response()->json([
            'data' => $data,
            'status' => $status,
            'code' => $code
        ]);
    }
}
