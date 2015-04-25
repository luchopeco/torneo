<?php namespace torneo\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use torneo\Http\Requests;
use torneo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use torneo\Jugador;

class JugadoresController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

    public function buscar(Request $request)
    {
        $ar = Jugador::findOrFail($request->idjugador);
        $response = array(
            "result" => true,
            "mensaje" => "No se pudo realizar la operacion",
            "datos" => $ar
        );
        return json_encode($response, JSON_HEX_QUOT | JSON_HEX_TAG);
        //return view('articulos', compact('art'));
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        try{
            $jugador = new Jugador($request->all());
            $jugador->save();

            Session::flash('mensajeOk', 'Jugador Agregado con Exito');
            return Redirect::route('admin.equipos.show',array($request->idequipo));
        }
        catch(QueryException  $ex)
        {

            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.equipos.show',array($request->idequipo));
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
        try {
            $ar = Jugador::findOrFail($request->idjugador);
            $ar->nombre_jugador = $request->nombre_jugador;
            $ar->dni=$request->dni;
            $ar->observaciones=$request->observaciones;
            $ar->save();

            Session::flash('mensajeOk', 'Jugador Modificado con Exito');
            return Redirect::route('admin.equipos.show',array($request->idequipo));
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.equipos.show',array($request->idequipo));
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
        try
        {
            Jugador::destroy($request->idjugador);
            Session::flash('mensajeOk', 'Jugador Eliminado con Exito');
            return Redirect::route('admin.equipos.show',array($request->idequipo));
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.equipos.show',array($request->idequipo));
        }
	}

}
