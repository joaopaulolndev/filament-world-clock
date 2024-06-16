<?php

namespace Joaopaulolndev\FilamentWorldClock\Widgets;

use AllowDynamicProperties;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Joaopaulolndev\FilamentWorldClock\Helpers\FlagsHelper;

#[AllowDynamicProperties]
class WorldClockWidget extends Widget
{
    protected static bool $isLazy = false;

    protected static string $view = 'filament-world-clock::filament.widgets.world-clock-widget';

    protected array $cities;

    protected static ?string $pollingInterval = '60s';

    public function __construct()
    {
        $timezones = [
            'Asia/Tokyo',
            'America/New_York',
            'America/Los_Angeles',
        ];

        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-world-clock');

        if ($plugin->getTimezones()) {
            $timezones = $plugin->getTimezones();
        }

        $times = [];
        foreach ($timezones as $timezone) {

            $time = Carbon::now($timezone);
            $name = explode('/', $time->getTimezone()->getName())[1];
            $name = str_replace('_', ' ', $name);
            $hour = (int) $time->format('H');
            $times[] = [
                'name' => __(ucwords($name)),
                'time' => $time->format($plugin->getTimeFormat() ?? 'H:i'),
                'flag' => FlagsHelper::get($timezone),
                'night' => $hour > 17 || $hour <= 6 ? true : false,
            ];
        }

        $this->cities = $times;
    }

    public function shouldShowTitle(): bool
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-world-clock');

        return $plugin->getShouldShowTitle();
    }

    public function title()
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-world-clock');

        return $plugin->getTitle();
    }

    public function description()
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-world-clock');

        return $plugin->getDescription();
    }

    public function quantityPerRow()
    {
        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-world-clock');

        return $plugin->getQuantityPerRow();
    }

    public static function getSort(): int
    {

        $plugin = Filament::getCurrentPanel()?->getPlugin('filament-world-clock');

        return $plugin->getSort() ?? -1;
    }

    public function render(): View
    {

        return view(static::$view, [
            'cities' => $this->cities,
            'shouldShowTitle' => $this->shouldShowTitle(),
            'title' => $this->title(),
            'description' => $this->description(),
            'quantityPerRow' => $this->quantityPerRow() ?? '1',
        ]);
    }
}
