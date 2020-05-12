<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Star extends Model {
    
    protected $table='star';
    

    public function user() {

        return $this->belongsTo('App\User', 'user_id');
    }

    public function Publication() {

        return $this->belongsTo('App\Publication', 'publication_id');
    }

}
