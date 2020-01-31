<?php

use App\Enums\LotteryGameId;

// cd 限流每幾秒可請求一次

return [
    "one"   => [
        "url"     => "http://127.0.0.1:8000/api/one",
        "gameKey" => [
            LotteryGameId::Chongqing_SSC   => 'ssc',
            LotteryGameId::Beijing_11_to_5 => 'bjsyxw'
        ],
        "cd"      => 5,
    ],
    "two"   => [
        "url"     => "http://127.0.0.1:8000/api/two",
        "gameKey" => [
            LotteryGameId::Chongqing_SSC   => 'cqssc',
            LotteryGameId::Beijing_11_to_5 => 'bj11x5'
        ],
        "cd"      => 3,
    ],
    "three" => [
        "url"     => "http://127.0.0.1:8000/api/three",
        "gameKey" => [
            LotteryGameId::Chongqing_SSC   => 'three_code_1',
            LotteryGameId::Beijing_11_to_5 => 'three_code_2'
        ],
        "cd"      => 10,
    ],
];