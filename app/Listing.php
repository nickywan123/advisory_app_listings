<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'latitude', 'longitude','user_id'
    ];

    public function path(){
        return "/dashboard/listings/{$this->id}";
    }

}
