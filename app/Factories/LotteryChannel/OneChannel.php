<?php

namespace App\Factories\LotteryChannel;

use App\Exceptions\FetchFailureException;
use App\Services\Lottery;

class OneChannel extends LotteryChannel
{
    public function fetchWinningNumber(Lottery $lottery)
    {
        $channelConfig = config('lotteryChannel.' . $this->channelId);
        $url = $channelConfig['url'];
        $gameKey = $channelConfig['gameKey'][$lottery->gameId];
        $issue = $lottery->issue;
        $url = $url . "?gamekey=$gameKey&issue=$issue";
        $output = $this->getByCURL($url);

        if (!isset($output->result->data->award)) {
            throw new FetchFailureException('fetch data incorrect, url: ' . $url);
        }
        return $output->result->data->award;
    }
}