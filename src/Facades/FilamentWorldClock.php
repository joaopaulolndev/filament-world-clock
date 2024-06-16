<?php

namespace Joaopaulolndev\FilamentWorldClock\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Joaopaulolndev\FilamentWorldClock\FilamentWorldClock
 */
class FilamentWorldClock extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Joaopaulolndev\FilamentWorldClock\FilamentWorldClock::class;
    }
}
