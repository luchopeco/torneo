<?php namespace torneo\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use torneo\Fecha;
use torneo\Http\Requests;
use torneo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use torneo\Partido;

class PartidosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        try{

            $partido = new Partido($request->all());
            $partido->save();

            Session::flash('mensajeOk', 'Partido Agregado con Exito');
            return Redirect::route('admin.fechas.show',$request->idfecha);
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.fechas.show',$request->idfecha);
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
        $partido = Partido::findOrFail($id);

        return view('admin.partido', compact('partido'));
	}

    public function buscar(Request $request)
    {
        $ar = Partido::findOrFail($request->idpartido);
        $response = array(
            "result" => true,
            "mensaje" => "No se pudo realizar la operacion",
            "datos" => $ar
        );
        return json_encode($response, JSON_HEX_QUOT | JSON_HEX_TAG);
        //return view('articulos', compact('art'));
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

            $ar = Partido::findOrFail($request->idpartido);
            if($ar->goles_local!=null)
            {
                Session::flash('mensajeError', 'No puede modificar un partido q ya fue jugado');
                return Redirect::route('admin.fechas.show',$ar->idfecha);
            }
            $ar->hora=$request->hora;
            $ar->idequipo_local = $request->idequipo_local;
            $ar->idequipo_visitante = $request->idequipo_visitante;
            $ar->idarbitro = $request->idarbitro;
            $ar->save();

            Session::flash('mensajeOk', 'Partido Modificado con Exito');
            return Redirect::route('admin.fechas.show',$ar->idfecha);

        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.fechas.show',$ar->idfecha);
        }
	}
    public function resultado(Request $request)
    {
        try {

            $ar = Partido::findOrFail($request->idpartido);


            $ar->save();

            Session::flash('mensajeOk', 'Partido Modificado con Exito');
            return Redirect::route('admin.fechas.show',$ar->idfecha);

        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.fechas.show',$ar->idfecha);
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
            $par = Partido::findOrFail($request->idpartido);
            Partido::destroy($request->idpartido);
            Session::flash('mensajeOk', 'Partido Eliminado con Exito');
            return Redirect::route('admin.fechas.show',$par->idfecha);
        }
        catch(QueryException  $ex)
        {
            $par = Partido::findOrFail($request->idpartido);
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.fechas.show',$par->idfecha);
        }
	}

}
