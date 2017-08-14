<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parkplan extends Model
{
    protected $table = 'parkplans';
    protected $fillable = ['name', 'users_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function attractions()
    {
        return $this->belongsToMany('App\Attraction');
    }
}
