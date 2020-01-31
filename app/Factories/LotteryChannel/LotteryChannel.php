<?php

namespace App\Factories\LotteryChannel;

use App\Exceptions\ChannelCDException;
use Illuminate\Support\Facades\Cache;

abstract class LotteryChannel implements LotteryChannelInterface
{
    protected $channelId;

    public function __construct($channelId)
    {
        $this->channelId = $channelId;
    }

    protected function getByCURL($url)
    {
        $this->checkRequestTime();

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output);
    }

    protected function checkRequestTime()
    {
        $cdTime = config('lotteryChannel.' . $this->channelId . '.cd');
        $lastTime = Cache::get($this->cacheKey());
        $now = now()->timestamp;
        if ($lastTime + $cdTime > $now) {
            throw  new ChannelCDException("cd not enough");
        }
        Cache::set($this->cacheKey(), $now);
    }

    protected function cacheKey()
    {
        return $this->channelId . '_requestTime';
    }
}