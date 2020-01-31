<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FakeLottery extends Controller
{
    public function one()
    {
        return response()->json([
            "result" => [
                "cache" => 0,
                "data"  => [
                    "gid"        => "20190902001",
                    "award"      => "6,1,9,0,3",
                    "updatetime" => "1567446006"
                ]
            ]
        ]);
    }

    public function two()
    {
        return response()->json([
            "rows" => "3",
            "code" => "cqssc",
            "data" => [
                [
                    "expect"   => "20190902003",
                    "opencode" => "3,8,1,9,5",
                    "opentime" => "2019-09-02 01:12:46"
                ],
                [
                    "expect"   => "20190902002",
                    "opencode" => "3,1,5,8,6",
                    "opentime" => "2019-09-02 00:52:37"
                ],
                [
                    "expect"   => "20190902001",
                    "opencode" => "6,1,9,0,3",
                    "opentime" => "2019-09-02 00:32:03"
                ]
            ]
        ]);
    }
}
