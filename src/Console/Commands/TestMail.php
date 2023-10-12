<?php

namespace Devertix\EnvTestHelpers\Console\Commands;

use Devertix\EnvTestHelpers\Mail\TestEmail;
use Illuminate\Console\Command;
use \Mail;

class TestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env-test:mail {email?} {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to check mail settings';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');
        if (empty($email)) {
            $email = $this->ask('E-mail');
        }

        $name = $this->argument('name');
        if (empty($name)) {
            $name = 'Test User';
        }

        $outputs = $this->checkMail($email, $name);

        foreach ($outputs as $out) {
            $this->line($out);
        }
    }

    public function checkMail($email, $name)
    {
        try {
            Mail::send(new TestEmail(
                $email,
                $name
            ));
        } catch (\Exception $e) {
            return [
                'Error:',
                $e->getMessage(),
            ];
        }

        return [
            'Mail sent',
        ];
    }
}
