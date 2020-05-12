<?php

namespace App\Http\Controllers;

use App\Star;
use Illuminate\Http\Request;

class StarController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function like($publication_id) {

        $user = \Auth::user();
        $isset_star = Star::where('user_id', $user->id)
                ->where('publication_id', $publication_id)
                ->count();

        if ($isset_star == 0) {
            $star = new Star();
            $star->user_id = $user->id;
            $star->publication_id = (int) $publication_id;
           
            $star->save();
            
        } else {
            return response()->json([
                        'message' => 'El Estrella ya existe'
            ]);
        }
    }

    public function dislike($publication_id) {
        $user = \Auth::user();
        $star = Star::where('user_id', $user->id)
                ->where('publication_id', $publication_id)
                ->first();

        if ($star) {
            $star->delete();
            return response()->json([
                        'star' => $star,
                        'message' => 'Lo borraste correctamente'
            ]);
        } else {
            return response()->json([
                        'message' => 'La estrella no existe'
            ]);
        }
    }

}
