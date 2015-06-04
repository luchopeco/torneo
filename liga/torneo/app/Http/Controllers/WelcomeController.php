<?php namespace torneo\Http\Controllers;

use torneo\Imagen;
use torneo\Torneo;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $listEquipoIdeal=Imagen::where('idtipo_imagen',3)->get();
        $listFiguras=Imagen::where('idtipo_imagen',2)->get();
		return view('welcome',compact('listFiguras','listEquipoIdeal'));
	}

    public function fixture()
    {
        $listTorneosCombo = Torneo::all()->lists('nombre_torneo', 'idtorneo');
        return view('fixture',compact('listTorneosCombo'));
    }
    public function fixturetorneo($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('include.fixture',compact('torneo'));
    }

    public function estadisticas()
    {
        $listTorneosCombo = Torneo::all()->lists('nombre_torneo', 'idtorneo');
        return view('estadisticas',compact('listTorneosCombo'));
    }
    public function estadisticastorneo($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('include.estadisticas',compact('torneo'));
    }
    public function instalaciones()
    {
        return view('instalaciones');
    }
}
