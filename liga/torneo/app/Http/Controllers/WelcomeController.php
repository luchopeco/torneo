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
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $listEquipoIdeal=Imagen::all()->where('idtipo_imagen',3)->where('mostrar',1);
        $listFiguras=Imagen::all()->where('idtipo_imagen',2)->where('mostrar',1);
		return view('welcome',compact('listFiguras','listEquipoIdeal'));
	}

    public function fixture()
    {

        $listTorneos = Torneo::withTrashed()->get();
        $listTorneosCombo = Torneo::all()->lists('nombre_torneo', 'idtorneo');


        return view('fixture',compact('listTorneos','listTorneosCombo'));
    }
}
