<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'Payment';

    public function ppob()
    {
        return $this->belongsTo(PPOBTrans::class,'InvoiceID','InvoiceID');
    }
}
