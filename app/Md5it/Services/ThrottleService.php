<?php

/**
 * Created by PhpStorm.
 * User: justin
 * Date: 4/27/17
 * Time: 11:20 PM
 */
namespace App\Md5it\Services;

use Illuminate\Support\Facades\Redis;

class ThrottleService
{
    protected $key = null;
    protected $seconds = null;

    public function __construct($ip, $seconds=1)
    {
        $this->key = 'user:'.$ip;
        $this->seconds = $seconds;
    }

    private function lastRequest()
    {
        return Redis::get($this->key) ?: 0;
    }

    private function lastRequestWithDelay()
    {
        return $this->lastRequest()+$this->seconds;
    }

    public function userCanSendRequest()
    {
        if(time() > $this->lastRequestWithDelay()) {
            Redis::set($this->key,time());
            return true;
        }
        return false;
    }
}