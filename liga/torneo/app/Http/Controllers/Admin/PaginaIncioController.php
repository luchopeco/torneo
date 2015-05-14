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

}
