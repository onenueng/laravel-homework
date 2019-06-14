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

    public function getTypeName(){
        switch($this->type){
            case 1:
                return "งานคณะฯ";
                break;
            case 2:
                return "งานตามชื่อตำแหน่";
                break;
            case 3:
                return "งานที่ได้รับมอบหมาย";
                break;
            case 4:
                return "งานเพื่อส่วนรวม";
                break;
            default:
                return "Unknown";
                break;
        }

    }
}
