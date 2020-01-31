<?php

namespace App\Factories\GameHandler;

interface GameHandlerInterface
{
    public function handle();

    public function getMainNumber();

    public function loopMatchNumber($mainNumber);
}