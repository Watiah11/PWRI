<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RefreshToken extends Model
{
    protected $table = 'RefreshToken';
    protected $guarded = [];

    public $timestamps =false;
}
