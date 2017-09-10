<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $fillable = ['testimonial_name','testimonial_images','testimonial_companies','testimonial_country','testimonial_desc','testimonial_facebook','testimonial_twitter','testimonial_google_pluS','testimonial_extra','user_id'];

}
