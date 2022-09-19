<?php

namespace App\Console\Commands;

use App\Jobs\CreateStatusJob;
use App\Jobs\SeedStatusJob;
use Illuminate\Console\Command;

class AutoDispatchSeedStatusJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'status:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate ticket status table and seed defaults';

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
     * @return int
     */
    public function handle()
    {
        // dispatch job to queue. You can find it on the 'jobs' table
        CreateStatusJob::dispatch(); 
    }
}
