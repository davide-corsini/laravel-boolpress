<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
class Post extends Model
{
    //dovró poi aggiungerlo nel momento in cui add Crude la Fkey user_id
    protected $fillable = [
        'title', 'content', 'slug', 'post_img'

    ];

    //Instauro relazione con Model User
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

}
















