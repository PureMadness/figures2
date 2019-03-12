<?php

namespace App\Console\Commands;

use App\Models\Figure;
use Illuminate\Console\Command;

class DeleteLessFigures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:less {area}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete figures with area less than entered area';

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
        $figures = Figure::where('area', '<=', $this->argument('area'));
        $count = $figures->count();
        $this->info($this->argument('area'));
        if ($this->confirm('Do you realy want to delete ' . $count . ' figures?')){
            $figures->delete();
        }
    }
}
