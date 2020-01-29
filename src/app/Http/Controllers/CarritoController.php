<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrito;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carrito::all();

        $status = 200;
        $code = 'Cart rows found';

        if ( count($data) === 0 ) {
            $status = 404;
            $code = 'Cart rows not found';
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
        $data = new Carrito();

        $data->user_id = $request->input('user_id');
        $data->estado = $request->input('estado');
        $data->servicios = $request->input('servicios');

        $data->save();

        $status = 200;
        $code = 'Cart created';

        return response()->json([
            "data" => $data,
            "code" => $code,
            "status" => $status
        ]);
    }

    public function getCarritoByUser($id) {
        $data = \DB::table('carritos')->where('user_id', $id)->get();

        $status = 404;
        $code = 'Cart Not Found';

        if ( count($data) !== 0 ) {
            $status = 200;
            $code = 'Cart Found';
        }

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
        //
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
        $data = Carrito::find($id);
        $code = 404;
        $status = 'Cart not found';

        if ( $data !== null ) {
            $code = 200;
            $status = 'Cart updated';

            $data->user_id = $request->input('user_id');
            $data->estado = $request->input('estado');
            $data->servicios = $request->input('servicios');

            $data->save();
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
        //
    }
}
