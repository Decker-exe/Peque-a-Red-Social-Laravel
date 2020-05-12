<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model {

    protected $table = 'publication';

    //relacion One to many/ de uno a muchos
    public function comment() {
        return $this->hasMany('App\Comment');
    }

    public function star() {
        return $this->hasMany('App\Star');
    }

    //relacion Many to One/ de muchos a uno

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
