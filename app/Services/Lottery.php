<?php

namespace App\Services;

class Lottery
{
    public $gameId;
    public $issue;
    public $lotteryInfo;

    public function __construct($gameId, $issue)
    {
        $this->gameId = $gameId;
        $this->issue = $issue;
    }

    public function update($data)
    {
        $this->lotteryInfo = $data;
    }
}