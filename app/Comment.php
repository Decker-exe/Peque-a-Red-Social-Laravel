<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'Comment';

    //relacion Many to One/ de muchos a uno

    public function user() {

        return $this->belongsTo('App\User', 'user_id');
    }

    public function Publication() {

        return $this->belongsTo('App\Publication', 'publication_id');
    }

    
}
