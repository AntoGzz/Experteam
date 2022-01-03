<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $fillable =[
    	'NumeroGuia', 'FechaEnvio', 'PaisOrigen', 'NombreRemitente', 'DireccionRemitente', 'TelefonoRemitente', 'EmailRemitente', 'PaisDestino', 'NombreDestinatario','DireccionDestinatario','TelefonoDestinatario','EmailDestinatario','Total',
    ];

    public function invoice()
    {
    	return $this->belongsTo(Invoice::class);
    }
}
