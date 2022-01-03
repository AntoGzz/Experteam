<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['Establecimiento', 'PuntoEmision', 'Secuencial', 'FechaEmision', 'Subtotal', 'Impuesto', 'Total'];

    public function guide(){
        return $this->belongsTo(Guide::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
