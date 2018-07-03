<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'lname','country', 'email', 'password','phonenumber','fname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
}
