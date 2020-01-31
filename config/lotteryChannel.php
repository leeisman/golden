<?php

use App\Enums\LotteryGameId;

return [
    "one" => [
        "url"     => "http://127.0.0.1:8000/api/one",
        "gameKey" => [
            LotteryGameId::Chongqing_SSC   => 'ssc',
            LotteryGameId::Beijing_11_to_5 => 'bjsyxw'
        ],
    ],
    "two" => [
        "url"     => "http://127.0.0.1:8000/api/two",
        "gameKey" => [
            LotteryGameId::Chongqing_SSC   => 'cqssc',
            LotteryGameId::Beijing_11_to_5 => 'bj11x5'
        ],
    ]
];