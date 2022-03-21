<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Discount;
use Illuminate\Console\Command;

class UpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Discount $model)
    {
        parent::__construct($model);
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Discount::where('end', '<', Carbon::now())
            ->update(['status' => 0]);
        $this->info('update:status Cummand Run successfully!');
    }
}
