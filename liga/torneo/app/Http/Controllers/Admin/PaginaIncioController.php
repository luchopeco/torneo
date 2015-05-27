<?php namespace torneo\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use torneo\Http\Requests;
use torneo\Http\Controllers\Controller;

use Illuminate\Http\Request;
use torneo\SliderHome;

class PaginaIncioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $listSlider = SliderHome::all();
        return view('admin.paginainicio', compact('listSlider'));
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
            $slider = new SliderHome($request->all());
            $slider->save();

            Session::flash('mensajeOk', 'Slider Agregado con Exito');
            return redirect()->route('admin.pagina-inicio.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.pagina-inicio.index');
        }
	}
    public function buscar(Request $request)
    {
        $ar = SliderHome::findOrFail($request->idslider);
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
            $ar = SliderHome::findOrFail($request->idslider_home);
            $ar->titulo = $request->titulo;
            if ($request->mostrar <> null) {
                $ar->mostrar = 1;
            } else {
                $ar->mostrar = 0;
            }
            $ar->save();

            Session::flash('mensajeOk', 'Slider Modificado con Exito');
            return redirect()->route('admin.pagina-inicio.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.pagina-inicio.index');
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
            SliderHome::destroy($request->idslider_home);
            Session::flash('mensajeOk', 'Slider Eliminado con Exito');
            return redirect()->route('admin.pagina-inicio.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.pagina-inicio.index');
        }
	}

	 public function sliderhomeimagen($id)
    {
        $slider = SliderHome::find($id);
        return view('admin.sliderhomeimagen', compact('slider'));
    }



	 public function sliderfotoguardar(Request $request)
    {
        try
        {
            $slider=SliderHome::findOrFail($request->idslider_home);

            if ( Input::hasFile('file')) {
                $file = Input::file('file');
                $slider->imagen = 'imagen-slider'.$slider->idslider_home.'.'.$file->getClientOriginalExtension();
                //guardamos la imagen en public/imagenes/articulos con el nombre original
                $file->move("imagenes", 'imagen-slider'.$slider->idslider_home.'.'.$file->getClientOriginalExtension());
                $extension = $file->getClientOriginalExtension();
            }
            $slider->save();

            // y retornamos un JSON con estatus en 200
            //return Response::json(['status'=>'true'],200);
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.paginainicio.index' );
        }
    }
    public function sliderfotoborrar(Request $request)
    {
        try
        {
            $slider=SliderHome::findOrFail($request->idslider_home);
            $slider->imagen=null;
            $slider->save();

            Session::flash('mensajeOk', 'Imagen del slider  '.$slider->titulo.' Eliminada con exito');
            return  Redirect::route('admin.paginainicio.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.paginainicio.index');
        }
    }

	/*
    public function equipoescudoguardar(Request $request)
    {
        try
        {
            $equipo=Equipo::findOrFail($request->idequipo);

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
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.equipos');
        }
    }
    public function equipoescudoborrar(Request $request)
    {
        try
        {
            $equipo=Equipo::findOrFail($request->idequipo);
            $equipo->escudo=null;
            $equipo->save();

            Session::flash('mensajeOk', 'Escudo del Equipo '.$equipo->nombre_equipo.' Eliminada con exito');
            return Redirect::route('admin.equipos.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return Redirect::route('admin.equipos.index');
        }
    }

    */

}
