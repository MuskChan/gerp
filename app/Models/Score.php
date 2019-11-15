<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = [
        'score', 'remark'
    ];

//    //修改器
//    public function setScoreAttribute($value)
//    {
//        $this->attributes['score'] = '评分：'.$value;
//    }
}
