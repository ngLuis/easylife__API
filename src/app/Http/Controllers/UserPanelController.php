<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserPanel;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ImagesController;

class UserPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserPanel::all();

        $code = 404;
        $status = "Error there isn't users in the database";

        if( $data !== null ){
            $code = 200;
            $status = "Success";
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
        $data = UserPanel::find($id);

        $status = 404;
        $code = 'User Not Found';

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

        $user = UserPanel::find($id);
    
        
        if ($user !== null ){
            $user->name = $request->input('name');
            $user->dni = $request->input('dni');
            $user->email = $request->input('email');
            $pass = Hash::make($request->input('password'));
            $user->password = $pass;
            $user->mobilephone = $request->input('telefono');
            $user->address = $request->input('direccion');
        
            $user->update(); 

            $status = 200;
            $code = 'user updated';

            return response()->json([
                "code" => $code,
                "status" => $status
            ]);
        } else {

            $status = 404;
            $code = 'Usuario no encontrado';
            return response()->json([
                "code" => $code,
                "status" => $status
            ]);
        }
    }

    public function patchUser(Request $request, $id)
    {

        $user = UserPanel::find($id);
        
        if ($user !== null ){
            $user->name = $request->input('name');
            $user->dni = $request->input('dni');
            $user->email = $request->input('email');
            $pass = Hash::make($request->input('password'));
            $user->password = $pass;
            $user->mobilephone = $request->input('telefono');
            $user->address = $request->input('direccion');

            if ( $request->input('type') !== null ){
                $user->type = $request->input('type');
            }
        
            $user->update(); 

            $status = 200;
            $code = 'user updated';

            return response()->json([
                "code" => $code,
                "status" => $status
            ]);
        } else {

            $status = 404;
            $code = 'Usuario no encontrado';
            return response()->json([
                "code" => $code,
                "status" => $status
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UserPanel::find($id);
        $data->delete();
    }
}
