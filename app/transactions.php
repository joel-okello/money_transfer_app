<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
	   public $timestamps = false;
       protected $fillable = [
        'sender_account','reciever_account', 'amount'
    ];

}
