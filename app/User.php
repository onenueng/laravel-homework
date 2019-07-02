<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $fillable = ['user_id'];

    public function tasks(){
        return $this->hasMany(task::class);
    }
}
