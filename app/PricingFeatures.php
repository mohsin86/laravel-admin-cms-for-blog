<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingFeatures extends Model
{
    //
    protected $fillable = ['pricing_additional_feature_title', 'pricing_id', 'user_id'];


    public function pricings()
    {
        return $this->belongsToMany('App\Pricing');
    }
}
