<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Str;

/** @mixin Eloquent */
class Alumnus extends Model
{
    protected $guarded = [];

    protected $appends = ["name"];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }


    /**
     * @param Builder $builder
     * @param $query
     *
     */
    public function scopeSearch(Builder $builder, $query)
    {
        collect(explode(" ", $query))->map(function($token){
            return $token;
        })->each(function($token) use ($builder){
            $builder
                ->where("first_name", "LIKE", "%{$token}%")
                ->where("middle_name", "LIKE", "%{$token}%")
                ->orWhere("last_name", "LIKE", "%{$token}%")
                ->orWhere("type", "LIKE", "%{$token}%");
        });
    }

    public function setPasswordAttribute($password){

        $this->attributes['password'] = Hash::make($password);
    }

    public function getNameAttribute()
    {
        return $this->attributes["first_name"] ." ". $this->attributes["middle_name"]. " ". $this->attributes["last_name"];
    }
}
