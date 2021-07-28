<?php

namespace App\Console\Commands;


use App\Models\User;
use Illuminate\Console\Command;

class Hello extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Hello {firstName=Sharif} {--L|lastName=Ahmed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Custom hello command from sharif';

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
        $fname= $this->argument('firstName');
        $lname= $this->option('lastName');
        $this->info($fname. ' '.$lname);
        $username = $this->ask('What is your username?');
        $this->info($username);
        $pass = $this->secret('What is your password?');
        $confirm = $this->confirm('Want to print your password?');
        if($confirm){
            $this->error($pass);
        }

        $header = ['Name', 'Email'];
        $user = User::select('name', 'email')->get();
        $this->table($header, $user);

    }
}
