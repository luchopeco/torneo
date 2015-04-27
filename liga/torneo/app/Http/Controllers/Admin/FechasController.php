<?php namespace torneo\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use torneo\Fecha;
use torneo\Http\Requests;
use torneo\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FechasController extends Controller {

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
        $ar = Fecha::findOrFail($request->idfecha);
        $ar->fecha=implode('/',array_reverse(explode('-',$ar->fecha)));
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
            $fech = new Fecha($request->all());
            if ($request->es_play_off <> null) {
                $fech->es_play_off = 1;
            } else {
                $fech->es_play_off = 0;
            }
            $fech->fecha=implode('-',array_reverse(explode('/',$request->fecha)));

            $fech->save();

            Session::flash('mensajeOk', 'Fecha Agregada con Exito');
            return Redirect::route('admin.torneos.show',array($request->idtorneo));
        }
        catch(QueryException  $ex)
        {

            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.torneos.show',array($request->idtorneo));
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
        $fecha=Fecha::findOrFail($id);
        //dd($listArbitros);

        if ($fecha->Torneo==null)
        {
            Session::flash('mensajeError','El Torneo se encuentra inactivo. No puede Gestionar sus partidos');
            return redirect()->route('admin.torneos.index');
        }
        return view('admin.partidos', compact('fecha'));
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
            $ar = Fecha::findOrFail($request->idfecha);
            $ar->fecha=implode('-',array_reverse(explode('/',$request->fecha)));
            $ar->observaciones = $request->observaciones;
            $ar->numero_fecha = $request->numero_fecha;
            if ($request->es_play_off <> null) {
                $ar->es_play_off = 1;
            } else {
                $ar->es_play_off = 0;
            }

            $ar->save();

            Session::flash('mensajeOk', 'Fecha Modificada con Exito');
            return Redirect::route('admin.torneos.show',array($ar->idtorneo));
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.torneos.show',array($ar->idtorneo));
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
