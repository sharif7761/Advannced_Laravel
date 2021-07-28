<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RenameTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:rename {from : table name you want to rename} {to : table name you want now}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Custom command to rename a table';

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
        $from = $this->argument('from');
        $to = $this->argument('to');
        DB::statement("ALTER TABLE $from RENAME TO $to");
        $this->info("Table $from is now renamed to $to");
    }
}
