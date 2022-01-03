<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['TipoPago', 'Total'];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }
}
