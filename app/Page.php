<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = ['page_title','page_slug','page_subtitle','page_body','page_featured_image','user_id'];

    /*
     * A page can have many page Options
     */
    public function pageoption(){
        return $this->hasMany('App\PageOptions');
    }

}
