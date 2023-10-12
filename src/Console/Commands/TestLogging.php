<?php

namespace Devertix\EnvTestHelpers\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class TestLogging extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env-test:logging {--witherror}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Test logging.. ');
        Log::info('Info log test.');
        Log::error('Error log test.');
        if ($this->option('witherror')) {
            $this->info('Throwing an exception..');
            throw new Exception('Test exception.');
        }
        $this->info('Done.');
        return 0;
    }
}
