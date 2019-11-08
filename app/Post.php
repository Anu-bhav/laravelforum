<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts'; // can be used to rename
    //Primary Key
    public $primaryKey = 'id'; // id by default
    //Timestamps
    public $timestamps = true; // enabled by default
    
    public function user(){
        return $this->belongsTo('App\User');
    }

}
