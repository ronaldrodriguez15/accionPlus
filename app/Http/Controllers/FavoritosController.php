<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favoritos;

class FavoritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // busca los favoritos del usuario que se encuentra logeado en el momento
        $favoritos = Favoritos::where('user_id', auth()->user()->id)
                              ->orderBy('created_at', 'DESC')
                              ->get();

        return view('favoritos.index', compact('favoritos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('favoritos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validacion del form por backend
        $request->validate([
            'titulo' => 'required',
            'tema' => 'required',
            'url' => 'required'
        ]);
        
        // se guarda el registro en la BD
        $favoritos = Favoritos::create([
            'titulo' => $request->get('titulo'),
            'tema' => $request->get('tema'),
            'url' => $request->get('url'),
            'user_id' => auth()->user()->id
        ]);
        $favoritos->save();

        return redirect()->route('favoritos.index')->with('success', 'Excelente!!, tu sitio favorito ha sido guardado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // encuentra el usuario por ID
        $favorito = Favoritos::find($id);

        return view('favoritos.edit', compact('favorito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validacion del form por backend
        $request->validate([
            'titulo' => 'required',
            'tema' => 'required',
            'url' => 'required'
        ]);

        // trae la info del usuario que viene de la vista edit
        $favorito = Favoritos::find($id);

        // almacena la info en la BD
        $favorito->titulo = $request->get('titulo');
        $favorito->tema = $request->get('tema');
        $favorito->url = $request->get('url');
        $favorito->save();

        return redirect()->route('favoritos.index')->with('success', 'Bien!!, la información de tu sitio ha sido actualizada.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // trae los datos del usuario por el ID
        $favorito = Favoritos::find($id);

        // elimina al usuario
        $favorito->delete();

        return redirect()->route('favoritos.index')->with('success', 'Bien!!, Tu registro se ha eliminado correctamente.');

    }
}
