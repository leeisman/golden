<?php

namespace App\Factories\LotteryChannel;

abstract class LotteryChannel implements LotteryChannelInterface
{
    protected $channelId;

    public function __construct($channelId)
    {
        $this->channelId = $channelId;
    }

    protected function getByCURL($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output);
    }
}