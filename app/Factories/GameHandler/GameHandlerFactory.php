<?php

namespace App\Factories\GameHandler;

use App\Enums\LotteryGameId;
use App\Exceptions\FetchFailureException;
use App\Services\Lottery;

class GameHandlerFactory
{
    public static function createHandler(Lottery $lottery)
    {
        switch ($lottery->gameId) {
            case LotteryGameId::Chongqing_SSC:
                return new ChongqingSSC($lottery);
            case LotteryGameId::Beijing_11_to_5:
                return new Beijing11to5($lottery);
            default:
                throw  new FetchFailureException("game id incorrect");
        }
    }
}