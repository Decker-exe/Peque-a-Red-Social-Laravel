<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Image;
use App\Publication;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class bolicheController extends Controller {

    public function create() {
        $publication = Publication::orderBy('id', 'desc')->paginate(6);

        return view('publication.boliche', [
            'publication' => $publication
        ]);
    }

}
