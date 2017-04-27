<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hash extends Model
{
    protected $fillable = ['text'];
    protected $dates = ['created_at', 'updated_at', 'hashed_at', 'queried_at'];
}
