<?php namespace torneo\Http\Controllers\Admin;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use torneo\Equipo;
use torneo\Http\Requests;
use torneo\Http\Controllers\Controller;
use torneo\Jugador;
use torneo\Torneo;
use Illuminate\Http\Request;

class EquiposController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $listEquipos = Equipo::all();
        //dd($listArbitros);
        return view('admin.equipos', compact('listTorneos','mensajeOK','listEquipos'));
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
            $torneo = new Equipo($request->all());
            $torneo->save();

            Session::flash('mensajeOk', 'Equipo Agregado con Exito');
            return redirect()->route('admin.equipos.index');
        }
        catch(QueryException  $ex)
        {

            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.equipos.index');
        }
	}

    public function buscar(Request $request)
    {
        $ar = Equipo::findOrFail($request->idequipo);
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

        $equipo = Equipo::find($id);
        return view('admin.equipo', compact('equipo'));
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
            $ar = Equipo::findOrFail($request->idequipo);
            $ar->nombre_equipo = $request->nombre_equipo;
            $ar->save();

            Session::flash('mensajeOk', 'Equipo Modificado con Exito');
            return redirect()->route('admin.equipos.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.equipos.index');
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

    public function storejugador(Request $request)
    {

    }
    public function destroyjugador(Request $request)
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

}
