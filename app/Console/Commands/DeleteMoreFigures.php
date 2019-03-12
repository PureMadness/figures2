<?php

namespace App\Console\Commands;

use App\Models\Figure;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

class DeleteMoreFigures extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:more {area}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete figures with area more than entered area';

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
        $count = Figure::where('area', '>', $area)->count();
        if ($count === 0) {
            $this->info('Nothing to delete.');
            return;
        }
        if ($this->confirm('Do you realy want to delete ' . $count . ' figures?')) {
            while (Figure::where('area', '>', $area)->first() !== null) {
                $figures = Figure::where('area', '>', $area)->take(100)->get();
                foreach ($figures as $figure) {
                    $figure->delete();
                };
            }
        }
    }
}
