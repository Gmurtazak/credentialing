<?php

namespace App\Console\Commands;

use App\Services\ProjectSale\ProjectSaleService;
use Illuminate\Console\Command;

class dailyProjectSaleCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:projectSale';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check on daily basis, for reset project sale is_convertion column updates.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(public ProjectSaleService $projectSale)
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
        $this->projectSale->resetStatus();
        $this->info('Project sale reset service updated successfully.');
       \Log::info('Project sale reset service updated successfully.');
    }
}
