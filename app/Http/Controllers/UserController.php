<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller {

    public function index($searh = null) {
        if (!empty($searh)) {
            $users = User::where('name', 'LIKE', '%.$searh.%')
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        } else {
            $users = User::orderBy('id', 'desc')
                    ->paginate(5);
        }
        return view('home',[
            'users'=>$users
        ]);
    }

    public function __construct() {
        $this->middleware('auth');
    }

    public function config() {
        return view('user.config');
    }

    public function update(Request $request) {
        //conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;
        //validacion del los datos
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'direction' => 'required|string|max:255',
        ]);
        //obtener datos del usuario

        $name = $request->input('name');
        $surname = $request->input('surname');
        $direction = $request->input('direction');
        $email = $request->input('email');

        //Asignar nuevos valores al objeto usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->email = $email;
        $user->direction = $direction;

        //ejecutar consultas en la BD
        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'usuario actualizado correctamente']);
    }

}
