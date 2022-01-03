<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoicesPayments extends Model
{
    protected $fillable = ['invoice_id','payment_id'];

    public function invoice()
    {
    	$this->belongsTo(Invoice::class);
    }
    public function payment()
    {
    	$this->belongsTo(Payment::class);
    }
}
