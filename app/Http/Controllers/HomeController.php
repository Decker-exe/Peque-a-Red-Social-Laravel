<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Publication;
use App\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//le quite el controlador de usuarios    
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $avgvalor = Comment::avg('valor');
        $publication = Publication::orderBy('id', 'desc')->paginate(6);
       
      
        return view('home', [
           
            'publication' => $publication
        ]);
    }

}
