<?php

namespace App\Console\Commands;

use App\Models\Figure;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

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
        $area = $this->argument('area');
        $count = Figure::where('area', '<', $area)->count();
        if ($count === 0) {
            $this->info('Nothing to delete.');
            return;
        }
        if ($this->confirm('Do you realy want to delete ' . $count . ' figures?', true)) {
            Figure::where('area', '<', $area)->chunkById(100, function ($figures) {
                foreach ($figures as $figure) {
                    $figure->delete();
                }
            });
        }
    }
}
