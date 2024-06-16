<?php

namespace Joaopaulolndev\FilamentWorldClock\Commands;

use Illuminate\Console\Command;

class FilamentWorldClockCommand extends Command
{
    public $signature = 'filament-world-clock';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
