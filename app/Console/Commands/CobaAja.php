<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CobaAja extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:coba {message}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Coba artisan command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo $this->argument('message');
        return 0;
    }
}
