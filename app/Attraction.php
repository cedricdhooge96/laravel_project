<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attraction extends Model
{
    protected $table = 'attractions';
    protected $fillable = [ 'description', 'name', 'genres_id' ];

    public function genre()
    {
        return $this->belongsTo('App\Genre', 'genres_id', 'id');
    }

    public function scopeSearchText ($query, $search)
    {
        return $query->where(function($query) use ($search)
        {
            $query->where('name', 'LIKE', '%'.$search.'%')
                  ->orWhere('description', 'LIKE', '%'.$search.'%');
        });
    }

    public function scopeSearch($query, $search, $genre)
    {
        return $genre ? $query->searchText($search)
                              ->where('genres_id', '=', $genre)
                      : $query->searchText($search);
    }
}
