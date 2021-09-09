<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DatosController extends Controller
{
    public function index() 
    {
        // trae la información del usuario logeado en el momento
        $user = auth()->user();
        
        return view('datos', compact('user'));
    }

    public function update (Request $request, $id) {


        // Validacion del lado del backend
        $request->validate([
            'nombreUser' => 'required',
            'phoneUser' => 'required',
            'emailUser' => 'required',
            'adressUser' => 'required',
        ]);
        
        // encuentra al usuario por el ID y despues guarda la info en la BD
        $user = User::find($id);
        $user->name = $request->get('nombreUser');
        $user->telefono = $request->get('phoneUser');
        $user->email = $request->get('emailUser');
        $user->direccion = $request->get('adressUser');
        $user->save();
        
        return redirect()->route('bienvenido.index')->with('success', 'Tus datos han sido actualizados correctamente.');
        
    }
}
