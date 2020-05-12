<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function save(Request $request) {
        $validate= $this->validate($request,[
            'publication_id'=>'integer|required',
            'content'=>'string|required'
        ]);
        $user= \Auth::user();
        $publication_id=$request->input('publication_id');
        $content =$request->input('content');
       (int) $valor = $request->input ('valor');
        
        $comment=new Comment();
        $comment->user_id=$user->id;
        $comment->publication_id=$publication_id;
        $comment->content=$content;
        $comment->valor=$valor;
        
        $comment->save();
        //redirecion
        return redirect()->route('publication.detail',['id'=>$publication_id])
        ->with([
            'message'=>'publicaste tu comentario'
        ]);
    }
}
