<?php

namespace App\Models\Traits;

use Redis;
use Carbon\Carbon;

trait LastActivedAtHelper
{
    //缓存相关
    protected $hash_prefix = 'last_actived_at';
    protected $field_prefix = 'user_';

    public function recordLastActivedAt()
    {
        //获取今天的日期
        $date = Carbon::now()->toDateString();

        //Redis哈希表命名
        $hash = $this->hash_prefix . $date;

        //字段名称
        $field = $this->field_prefix . $this->id;
//
//        dd(Redis::hGetAll($hash));
        //当前时间
        $now = Carbon::now()->toDateTimeString();

        //写入Redis，存在会被更新
        Redis::hSet($hash, $field, $now);

    }
}

