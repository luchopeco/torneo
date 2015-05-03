<?php namespace torneo\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use torneo\Equipo;
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

        ///mando todos los jugadores locales con goles
        $listGoleadoresLocal = array();
        $sum=0;
        $equipo = Equipo::findOrFail($partido->EquipoLocal->idequipo);
        foreach($equipo->ListJugadores as $jugador)
        {
            foreach($partido->ListGoleadores as $goleador)
            {
                if ($jugador->idjugador == $goleador->idjugador)
                {
                    $jugador->goles_favor= $goleador->pivot->goles_favor;
                    $jugador->goles_contra=$goleador->pivot->goles_contra;
                    $jugador->cantidad_fechas_sancion=$goleador->pivot->cantidad_fechas_sancion;
                    $listGoleadoresLocal[$sum] = $jugador;
                    $sum=$sum+1;
                }
            }

        };

        ///mando todos los jugadores visitantes con goles
        $listGoleadoresVisitante = array();
        $sum=0;
        $equipos = Equipo::findOrFail($partido->EquipoVisitante->idequipo);
        foreach($equipos->ListJugadores as $jugador)
        {
            foreach($partido->ListGoleadores as $goleador)
            {
                if ($jugador->idjugador == $goleador->idjugador)
                {
                    $jugador->goles_favor= $goleador->pivot->goles_favor;
                    $jugador->goles_contra=$goleador->pivot->goles_contra;
                    $jugador->cantidad_fechas_sancion=$goleador->pivot->cantidad_fechas_sancion;
                    $listGoleadoresVisitante[$sum] = $jugador;
                    $sum=$sum+1;
                }
            }

        };
        $listJugadoresVisitantes= $equipos->ListJugadores->lists('nombre_jugador', 'idjugador');
        $listJugadoresLocales= $equipo->ListJugadores->lists('nombre_jugador', 'idjugador');
        return view('admin.partido', compact('partido','listGoleadoresLocal','listGoleadoresVisitante','listJugadoresLocales','listJugadoresVisitantes'));


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
            $ar->goles_local =$request->goles_local;
            $ar->goles_visitante=$request->goles_visitante;

            $ar->save();

            Session::flash('mensajeOk', 'Resultado Partido Actualizado con Exito');
            return Redirect::route('admin.partidos.show',$ar->idpartido);

        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.partidos.show',$ar->idpartido);

        }
    }
    public function goles(Request $request)
    {
        try {

            $ar = Partido::findOrFail($request->idpartido);

            $ar->ListGoleadores()->attach($request->idjugador,['goles_favor'=>$request->goles_favor]);
            Session::flash('mensajeOk', 'Gol Agregado con Exito');
            return Redirect::route('admin.partidos.show',$ar->idpartido);

        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.partidos.show',$ar->idpartido);

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
