<?php

namespace App\Factories\LotteryChannel;

use App\Services\Lottery;

interface LotteryChannelInterface
{
    public function fetchWinningNumber(Lottery $lottery);
}