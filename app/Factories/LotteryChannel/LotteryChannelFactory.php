<?php

namespace App\Factories\LotteryChannel;

use App\Exceptions\FetchFailureException;

class LotteryChannelFactory
{
    public static function createChannel($channelId)
    {
        switch ($channelId) {
            case "one":
                return new OneChannel($channelId);
            case "two":
                return new TwoChannel($channelId);
            case "three":
                return new ThreeChannel($channelId);
            default:
                throw new FetchFailureException("channel id incorrect");
        }
    }
}