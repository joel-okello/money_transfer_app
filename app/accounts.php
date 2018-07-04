<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class accounts extends Model
{
    //

     protected $fillable = [
        'account_name','account_type', 'account_number', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}
