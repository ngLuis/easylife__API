<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Carrito;
use App\CarritoServicio;

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

        $status = 200;
        $code = 'Cart created';
        $cartData = null;

        $cartServicesData = \DB::table('carritos')->where('user_id', $request->input('user_id'))->where('estado', 0);

        if ( count($cartServicesData->get()) === 0 ) {
            $cartData = new Carrito();

            $cartData->user_id = $request->input('user_id');
            $cartData->estado = $request->input('estado');

            $cartData->save();

            $servicios = $request->input('servicios');

            foreach ($servicios as $servicio ) {
                $cartServicesData = new CarritoServicio();
                $cartServicesData->carrito_id = $cartData->id;
                $cartServicesData->servicio_id = $servicio[0];
                $cartServicesData->unidades = $servicio[1];
                $cartServicesData->save();
            }
        } else {
            $status = 409;
            $code = 'There is other cart in process, please make a PUT method';
        }

        return response()->json([
            "data" => [
                "cartData" => $cartData,
            ],
            "code" => $code,
            "status" => $status
        ]);
    }

    //SELECT fields FROM carrito_servicio INNER JOIN carritos INNER JOIN servicios ON carritos.id = carrito_servicio.id AND carrito_servicio.servicio_id = servicios.id WHERE estado = 0 AND carritos.user_id = idUsuario
    public function getCarritoByUser($id, $estado) {

        $data = \DB::table('carrito_servicio')
        ->join('carritos', 'carritos.id', '=', 'carrito_servicio.carrito_id')
        ->join('servicios', 'servicios.id', '=', 'carrito_servicio.servicio_id')
        ->where('estado', $estado)
        ->where('carritos.user_id',$id)
        ->select('servicios.*', 'carrito_servicio.unidades', 'carritos.id AS cart_id')
        ->get();

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
        $cartBD = Carrito::find($id);
        $code = 404;
        $status = 'Cart not found';

        if ( $cartBD !== null ) {

            if ( $cartBD->estado === 0 ) {
                $code = 200;
                $status = 'Cart updated';

                CarritoServicio::where('carrito_id', $cartBD->id)->delete();

                $serviciosInput = $request->input('servicios');
                $serviciosDB = CarritoServicio::where('carrito_id', $cartBD->id);

                foreach ($serviciosInput as $servicio ) {
                    $serviciosDB = new CarritoServicio();
                    $serviciosDB->carrito_id = $cartBD->id;
                    $serviciosDB->servicio_id = $servicio[0];
                    $serviciosDB->unidades = $servicio[1];
                    $serviciosDB->save();
                }

                $estadoInput = $request->input('estado');

                if ( $estadoInput !== 0 ) {
                    $cartBD->estado = $estadoInput;
                    $cartBD->save();
                }

            } else {
                $code = 409;
                $status = 'Cart status is closed';
            }

        }

        return response()->json([
            "data" => $cartBD,
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
