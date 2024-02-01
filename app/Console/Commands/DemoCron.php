<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function __construct()  //Add this
    {
        parent::__construct();
    }

    public function handle()
    {
        //return Command::SUCCESS;  //Before Have
        \Log::info("Cron is working fine!");
    }
}
