<?php namespace torneo\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use torneo\Equipo;
use torneo\Imagen;
use torneo\Noticia;
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
        $listNoticias = Noticia::where('mostrar_en_home',1)->get();
        $listEquipoIdeal=Imagen::where('idtipo_imagen',3)->get();
        $listFiguras=Imagen::where('idtipo_imagen',2)->get();
		return view('welcome',compact('listFiguras','listEquipoIdeal','listNoticias'));
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

    public function equipo()
    {
        if (Session::has('equipo'))
        {
            return view('equipo');
        }
        else
        {
           // return view('equipo');
            return view('login');
        }
    }
    public function equiposalir()
    {
        Session::forget('equipo');
        return view('login');
    }
    public function loginequipo()
    {
        try {

            //$user = Equipo::find(23);
            //$user->clave = Hash::make('admin');
            //$user->save();
            $eq = Equipo::where('nombre_usuario',  Request::input('nombre_usuario'))->firstOrFail();
            if (Hash::check(Request::input('clave'),$eq->clave))
            {
                Session::put('equipo', $eq->idequipo);
                return redirect()->action('WelcomeController@equipo');
            }
            else
            {
                Session::flash('mensajeError', 'Usuario y/o clave incorrecta');
                return redirect()->action('WelcomeController@equipo');
            }
        }
        catch(\Exception $e)
        {
            Session::flash('mensajeError', 'Usuario y/o clave incorrecta');
            return redirect()->action('WelcomeController@equipo');
        }

    }


     public function inscripcion()
    {
        return view('inscripcion');
    }
}
