<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    Protected $fillable = [
        'name', 
        'email', 
        'value', 
        'commission'
    ];

    Protected $primaryKey = 'id';

    public static function emailSearch($email) {

        return static::where('email', '=', $email )->get();

    }


}
