<?php

namespace App\Console\Commands;

use App\Services\Lottery;
use App\Services\UpdateWinningNumberJob;
use Illuminate\Console\Command;

class UpdateWinningNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lottery:update_winning_number {gameId} {issue}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update lottery winning numbers';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $gameId = $this->argument('gameId');
        $issue = $this->argument('issue');
        $lottery = new Lottery($gameId, $issue);
        $updateWinningNumberJpb = new UpdateWinningNumberJob($lottery);
        $updateWinningNumberJpb->handle();
    }
}
