<?php

namespace App\Services;

use App\Factories\GameHandler\GameHandlerFactory;

class LotteryMaker
{
    protected $lottery;

    public function __construct(Lottery $lottery)
    {
        $this->lottery = $lottery;
    }

    public function getWinningNumber()
    {
        $gameHandler = GameHandlerFactory::createHandler($this->lottery);
        return $gameHandler->handle();
    }
}