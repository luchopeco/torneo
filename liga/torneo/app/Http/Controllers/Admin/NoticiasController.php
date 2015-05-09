<?php namespace torneo\Http\Controllers\Admin;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use torneo\Noticia;
use torneo\Http\Requests;
use torneo\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class NoticiasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $listNoticias = Noticia::all();
        //dd($listArbitros);
        return view('admin.noticias', compact('listNoticias','mensajeOK'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        try{
            $noticia = new Noticia($request->all());
            $noticia->save();

            Session::flash('mensajeOk', 'Noticia Agregada con Exito');
            return redirect()->route('admin.noticias.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.noticias.index');
        }

	}
    public function buscar(Request $request)
    {
        $ar = Noticia::findOrFail($request->idnoticia);
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
            $ar = Noticia::findOrFail($request->idnoticia);
            $ar->nombre = $request->nombre;
            $ar->save();

            Session::flash('mensajeOk', 'Noticia Modificada con Exito');
            return redirect()->route('admin.noticias.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.noticias.index');
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
            Noticia::destroy($request->idnoticia);
            Session::flash('mensajeOk', 'Noticia Eliminado con Exito');
            return redirect()->route('admin.noticias.index');
        }
        catch(QueryException  $ex)
        {
            Session::flash('mensajeError', $ex->getMessage());
            return redirect()->route('admin.noticias.index');
        }


	}

}
