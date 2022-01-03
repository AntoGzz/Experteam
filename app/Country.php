<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
    	'name', 'description'
    ];

    public function guides()
    {
    	return $this->hasMany(Guide::class);
    }
}
