<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
        'team_name',
        'team_images',
        'team_details',
        'team_designation',
        'team_facebook',
        'team_twitter',
        'team_google_pluS',
        'team_linkdin',
        'user_id'
    ];

}
