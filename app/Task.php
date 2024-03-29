<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // white list
    protected $fillable = [
        'type_id',
        'name',
        'detail',
        'status',
    ];

    public function getTypeName(){
        switch($this->type_id){
            case 1:
                return "Support";
                break;
            case 2:
                return "Maintain";
                break;
            case 3:
                return "Consult";
                break;
            case 4:
                return "Other";
                break;
            default:
                return "Unknown";
                break;
        }

    }

    public function type(){
        return $this->belongsTo(Type::class);

    }

    public function users(){
        return $this->belongsTo(user::class);
    }
}
