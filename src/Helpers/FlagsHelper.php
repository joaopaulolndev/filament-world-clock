<?php

namespace Joaopaulolndev\FilamentWorldClock\Helpers;

use DateTimeZone;

class FlagsHelper
{
    public static function get(string $timezone, array $customFlags = []): string
    {
        // 1. Custom flags from plugin config (highest priority)
        if (isset($customFlags[$timezone])) {
            return $customFlags[$timezone];
        }

        // 2. Dynamic resolution via PHP's timezone database
        try {
            $location = (new DateTimeZone($timezone))->getLocation();
            if ($location && ! empty($location['country_code']) && $location['country_code'] !== '??') {
                $code = strtolower($location['country_code']);

                return asset('vendor/blade-flags/country-' . $code . '.svg');
            }
        } catch (\Exception $e) {
            // Invalid timezone, fall through to placeholder
        }

        // 3. Placeholder fallback (e.g. Etc/UTC, Etc/GMT+5)
        return asset('vendor/blade-flags/country-xx.svg');
    }
}
