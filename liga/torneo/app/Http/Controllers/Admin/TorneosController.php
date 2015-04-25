<?php namespace torneo\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use torneo\Equipo;
use torneo\Http\Requests;
use torneo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use torneo\TipoTorneo;
use torneo\Torneo;

class TorneosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $listTorneos = Torneo::withTrashed()->get();
        $listTipoToneo = TipoTorneo::lists('nombre_tipo_torneo', 'idtipo_torneo');
        //dd($listArbitros);
        return view('admin.torneos', compact('listTorneos','listTipoToneo'));
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
            $torneo = new Torneo($request->all());
            $torneo->save();

            Session::flash('mensajeOk', 'Torneo Agregado con Exito');
            return redirect()->route('admin.torneos.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.torneos.index');
        }
	}

    public function buscar(Request $request)
    {
        $ar = Torneo::findOrFail($request->idtorneo);
        $response = array(
            "result" => true,
            "mensaje" => "No se pudo realizar la operacion",
            "datos" => $ar
        );
        return json_encode($response, JSON_HEX_QUOT | JSON_HEX_TAG);
        //return view('articulos', compact('art'));

    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $torneo = Torneo::find($id);
        ///Le mando todos los equipos!!
        $listEquipos= Equipo::orderBy('nombre_equipo', 'asc')->get()->lists('nombre_equipo', 'idequipo');
        //dd($listArbitros);
        return view('admin.torneo', compact('torneo','mensajeOK','listEquipos'));
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
            $ar = Torneo::findOrFail($request->idtorneo);
            $ar->nombre_torneo = $request->nombre_torneo;
            $ar->observaciones_torneo = $request->observaciones_torneo;
            $ar->idtipo_torneo = $request->idtipo_torneo;
            $ar->save();

            Session::flash('mensajeOk', 'Torneo Modificado con Exito');
            return redirect()->route('admin.torneos.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.torneos.index');
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
            Torneo::destroy($request->idtorneo);
            Session::flash('mensajeOk', 'Torneo Eliminado con Exito');
            return redirect()->route('admin.torneos.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.torneos.index');
        }
	}

    public function storeequipo(Request $request)
    {
        try {
            $torneo = Torneo::findOrFail($request->idtorneo);
            $equipo = Equipo::find($request->idequipo);
            $torneo->ListEquipos()->attach($equipo);

            Session::flash('mensajeOk', 'Equipo Agregado con Exito');
            return Redirect::route('admin.torneos.show',array($request->idtorneo));

        } catch (QueryException  $ex) {

            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.torneos.show',array($request->idtorneo));
        }
    }
    public function destroyequipo(Request $request)
    {
        try {
            $torneo = Torneo::findOrFail($request->idtorneo);
            $equipo = Equipo::find($request->idequipo);
            $torneo->ListEquipos()->detach($equipo);

            Session::flash('mensajeOk', 'Equipo Eliminado con Exito');
            return Redirect::route('admin.torneos.show',array($request->idtorneo));

        } catch (QueryException  $ex) {

            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.torneos.show',array($request->idtorneo));
        }
    }

    public function bajatorneo($idtorneo)
    {

    }
    
}
