<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Alumnus extends Model
{
    protected $guarded = [];

    protected $appends = ["name"];

    public function setPasswordAttribute($password){

        $this->attributes['password'] = Hash::make($password);
    }

    public function getNameAttribute()
    {
        return $this->attributes["first_name"] ." ". $this->attributes["middle_name"]. " ". $this->attributes["last_name"];
    }
}
