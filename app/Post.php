<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table="posts";
    public $fillable =['id', 'title', 'content', 'user_id', 'tag'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
