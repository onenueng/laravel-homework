<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // white list
    protected $fillable = [
        'type',
        'name',
        'detail',
        'status',
    ];
}
