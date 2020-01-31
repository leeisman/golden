<?php

namespace App\Factories\GameHandler;

use App\Exceptions\ChannelCDException;
use App\Exceptions\FetchFailureException;
use App\Factories\LotteryChannel\LotteryChannelFactory;
use App\Services\Lottery;

abstract class GameHandler implements GameHandlerInterface
{
    protected $mainChannel;
    protected $lottery;

    public function __construct(Lottery $lottery)
    {
        $this->lottery = $lottery;
    }

    public function handle()
    {
        $mainNumber = $this->getMainNumber();
        return $this->loopMatchNumber($mainNumber);
    }

    public function getMainNumber()
    {
        $mainChannel = LotteryChannelFactory::createChannel($this->mainChannel);
        try {
            return $mainChannel->fetchWinningNumber($this->lottery);
        } catch (ChannelCDException $exception) {
            //記錄起來
        }
    }

    public function loopMatchNumber($mainNumber)
    {
        $channels = config('lotteryChannel');
        foreach ($channels as $channelKey => $channel) {
            if ($channelKey == $this->mainChannel) {
                continue;
            }
            $otherChannel = LotteryChannelFactory::createChannel($channelKey);
            try {
                $number = $otherChannel->fetchWinningNumber($this->lottery);
            } catch (ChannelCDException $exception) {
                //記錄起來
            }
            if ($mainNumber !== null && isset($number) && $mainNumber === $number) {
                return $mainNumber;
            }
        }

        throw new FetchFailureException('not match number');
    }
}