<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class GenerateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate a new user with a token';

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
        $token = sha1(time());
        $user = new User();
        $user->name = $this->ask("What is the user name?");
        $user->api_token=$token;
        $user->save();
        $this->info("Token generated successfully:");
        $this->info($token);
    }
}
