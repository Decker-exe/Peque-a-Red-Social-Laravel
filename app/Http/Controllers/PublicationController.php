<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Publication;
use App\Comment;

class PublicationController extends Controller {

//le quite el controlador de usuarios
//    public function __construct() {
//        $this->middleware('auth');
//    }

    public function create() {
        return view('publication.create');
    }

    public function save(Request $request) {
        //validacion
        $validate = $this->validate($request, [
            'descriptionL' => 'required',
            'description' => 'required',
            'image_path' => 'required|image'
        ]);
        //Asigar valores nuevo  objeto
        $image_path = $request->file('image_path');
        $description = $request->input('description');
        $descriptionL = $request->input('descriptionL');
        $tipo = $request->input('tipo');
        //asignar valores nuevo objeto
        $user = \Auth::user();
        $publication = new Publication();
        $publication->user_id = $user->id;
        $publication->image_path = null;
        $publication->description = $description;
        $publication->descriptionL = $descriptionL;
        $publication->tipo = $tipo;

        //subir fichero
        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('image')->put($image_path_name, File::get($image_path));
            $publication->image_path = $image_path_name;
        }
        $publication->save();

        return redirect()->route('home')->with([
                    'message' => 'La Publicacion a sido subida correctament'
        ]);
    }

    public function getImage($filename) {
        $file = Storage::disk('image')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id) {
        //$id=5;
        $publication = Publication::find($id);

        return view('publication.detail', [
            'publication' => $publication
        ]);
    }

    public function edit($id) {
        $user = \Auth::user();
        $publication = Publication::find($id);
        if ($user && $publication && $publication->user->id == $user->id) {
            return view('publication.edit', [
                'publication' => $publication
            ]);
        } else {
            return redirect('home');
        }
        if (strlen($publication)) {
            
        }
    }

    public function delete($id) {
        $user = \Auth::user();
        $Publication = Publication::find($id);

        if ($user && $Publication && $user->id == $Publication->user_id) {


            //Eliminar comments
            $Publication->comment()->delete();

            //Eliminar imagen
            $Publication->delete();

            //Eliminar archivo en disco
            Storage::disk('image')->delete($Publication->image_path);

            $message = "La imagen se ha borrado correctamente";
        } else {
            $message = "La imagen no se ha borrado!!";
        }

        return redirect()->route('home')->with(['message' => $message]);
    }

    public function update(Request $request) {


        $validate = $this->validate($request, [
            'image_path' => 'image'
        ]);


        //recoger datos
        $publication_id = $request->input('publication_id');
        $image_path = $request->file('image_path');
        $description = $request->input('description');
        $descriptionL = $request->input('descriptionL');

        //conseguir objeto publication
        $publication = Publication::find($publication_id);
        $publication->description = $description;
        $publication->descriptionL = $descriptionL;
        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('image')->put($image_path_name, File::get($image_path));
            $publication->image_path = $image_path_name;
        }
        $publication->update();
        return redirect()->route('publication.detail', ['id' => $publication_id])
                        ->with(['message' => 'Publicacion actualizada']);
    }

}
