<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content_website';
    protected $primaryKey = 'id'; // or null
    protected $guarded = [];
}
