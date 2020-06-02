<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/** @mixin \Eloquent */
class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        "permissions" => "json"
    ];

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
                ->where("name", "LIKE", "%{$token}%")
                ->orWhere("role", "LIKE", "%{$token}%");
        });
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes["password"] = bcrypt($password);
    }
}
