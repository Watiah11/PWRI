<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasicSavingAccount extends Model
{
    protected $table = 'BasicSavingAccount';

    public function billing()
    {
        return $this->hasMany(BasicSavingBilling::class, 'AccountNumber', 'AccountNumber');
    }
}
