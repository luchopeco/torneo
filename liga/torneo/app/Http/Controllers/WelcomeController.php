<?php namespace torneo\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use torneo\Equipo;
use torneo\Imagen;
use torneo\Noticia;
use torneo\TipoTorneo;
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
        $listTiposTorneosCombo = TipoTorneo::all()->lists('nombre_tipo_torneo', 'idtipo_torneo');
        return view('fixture',compact('listTiposTorneosCombo'));
    }
    public function fixturetorneo($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('include.fixture',compact('torneo'));
    }

    public function estadisticas()
    {

        $listTiposTorneosCombo = TipoTorneo::all()->lists('nombre_tipo_torneo', 'idtipo_torneo');
        return view('estadisticas',compact('listTiposTorneosCombo'));
    }
    public function estadisticastorneo($id)
    {
        $torneo = Torneo::findOrFail($id);
        return view('include.estadisticas',compact('torneo'));
    }
    public function torneoportipotorneo($id)
    {
        $listtorneos = Torneo::where('idtipo_torneo',$id)->lists('nombre_torneo', 'idtorneo');
        return view('include.combotorneoestadisticas',compact('listtorneos'));
    }
    public function torneoportipotorneofixture($id)
    {
        $listtorneos = Torneo::where('idtipo_torneo',$id)->lists('nombre_torneo', 'idtorneo');
        return view('include.combotorneosfixture',compact('listtorneos'));
    }
    public function instalaciones()
    {
        return view('instalaciones');
    }

    public function equipo()
    {
        try
        {
            if (Session::has('equipo'))
            {
                $equipo=  Equipo::findOrFail(Session::get('equipo'));
                return view('equipo',compact('equipo'));
            }
            else
            {
                // return view('equipo');
                return view('login');
            }
        }
        catch(\Exception $ex )
        {
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

    public function equipoescudoguardar(Request $request)
    {
        try
        {

            $equipo=Equipo::findOrFail(Input::get('idequipo'));

            if ( Input::hasFile('file')) {
                $file = Input::file('file');
                $equipo->escudo = 'escudo-equipo'.$equipo->idequipo.'.'.$file->getClientOriginalExtension();
                //guardamos la imagen en public/imagenes/articulos con el nombre original
                $file->move("imagenes", 'escudo-equipo'.$equipo->idequipo.'.'.$file->getClientOriginalExtension());
                $extension = $file->getClientOriginalExtension();
            }
            $equipo->save();

            // y retornamos un JSON con estatus en 200
            //return Response::json(['status'=>'true'],200);
        }
        catch(QueryException  $ex)
        {

        }
    }

    public function equipofotoguardar(Request $request)
    {
        try
        {
            $equipo=Equipo::findOrFail(Input::get('idequipof'));

            if ( Input::hasFile('file')) {
                $file = Input::file('file');
                $equipo->foto = 'foto-equipo'.$equipo->idequipo.'.'.$file->getClientOriginalExtension();
                //guardamos la imagen en public/imagenes/articulos con el nombre original
                $file->move("imagenes", 'foto-equipo'.$equipo->idequipo.'.'.$file->getClientOriginalExtension());
                $extension = $file->getClientOriginalExtension();
            }
            $equipo->save();

            // y retornamos un JSON con estatus en 200
            //return Response::json(['status'=>'true'],200);
        }
        catch(QueryException  $ex)
        {

        }
    }
}
