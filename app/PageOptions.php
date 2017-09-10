<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageOptions extends Model
{
    //
    protected $fillable = ['page_options_title','page_options_slug','page_options_body','page_id'];

    /**
     * An PageOptions Belongs to Page
     */
    public function owner(){
        $this->belongsTo('App\Page');
    }
}
