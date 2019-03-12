<?php

namespace App\Console\Commands;

use App\Models\Figure;
use Illuminate\Console\Command;
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
        $count = Figure::where('area', '<=', $this->argument('area'))->count();
        $this->info($this->argument('area'));
        if ($this->confirm('Do you realy want to delete ' . $count . ' figures?')){
            Figure::where('area', '<=', $this->argument('area'))->chunk(100, function ($figures) {
                foreach ($figures as $figure) {
                    Storage::delete($figure->image);
                    $figure->delete();

                }
                $this->info(1);
            });
        }
    }
}
