<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'profile_url',
        'profile_image',
        'company_name',
        'company_url',
        'designation',
        'extra_info',
        'valid',
        'source',
        'user_id'
    ];
}
