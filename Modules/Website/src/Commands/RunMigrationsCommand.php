<?php

declare(strict_types=1);

namespace Modules\Website\Commands;

use Illuminate\Console\Command;

class RunMigrationsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'modules:run-migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs the modules migrations';

    /**
     * Execute the command.
     */
    public function fire()
    {
        $this->call('migrate', [
            '--path' => 'modules/Website/src/migrations',
        ]);
    }
}
