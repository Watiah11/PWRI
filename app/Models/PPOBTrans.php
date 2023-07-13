<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;

class PPOBTrans extends Model
{
    protected $table = 'PPOBTrans';

    public function payment()
    {
        return $this->belongsTo(Payment::class,'InvoiceID','InvoiceID');
    }

    public function master()
    {
        return $this->hasOne(PPOBMaster::class,'ProductCode','ProductCode');
    }
}
