<?php

namespace App\Factories\LotteryChannel;

use App\Exceptions\FetchFailureException;
use App\Services\Lottery;

class ThreeChannel extends LotteryChannel
{
    public function fetchWinningNumber(Lottery $lottery)
    {
        $channelConfig = config('lotteryChannel.' . $this->channelId);
        $url = $channelConfig['url'];
        $code = $channelConfig['gameKey'][$lottery->gameId];
        $issue = $lottery->issue;
        $url = $url . "?code=$code";
        $output = $this->getByCURL($url);

        if (!isset($output->data)) {
            throw new FetchFailureException('fetch data incorrect, url: ' . $url);
        }
        foreach ($output->data as $winNumber) {

            if (!isset($winNumber->expect)) {
                throw new FetchFailureException('fetch data incorrect, url: ' . $url);
            }
            if (!isset($winNumber->opencode)) {
                throw new FetchFailureException('fetch data incorrect, url: ' . $url);
            }
            if ($winNumber->expect == $issue) {
                return $winNumber->opencode;
            }
        }
        throw new FetchFailureException('not found match issue');
    }
}