<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuidesInvoices extends Model
{
    protected $fillable = ['guide_id', 'invoice_id'];

    public function invoice()
    {
    	$this->belongsTo(Invoice::class);
    }
    public function guide()
    {
    	$this->belongsTo(Guide::class);
    }
}
