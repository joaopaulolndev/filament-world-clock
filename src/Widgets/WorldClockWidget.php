<?php

namespace Joaopaulolndev\FilamentWorldClock\Widgets;

use AllowDynamicProperties;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Widgets\Widget;
use Illuminate\Contracts\View\View;
use Joaopaulolndev\FilamentWorldClock\FilamentWorldClockPlugin;
use Joaopaulolndev\FilamentWorldClock\Helpers\FlagsHelper;

#[AllowDynamicProperties]
class WorldClockWidget extends Widget
{
    protected static bool $isLazy = false;

    protected string $view = 'filament-world-clock::filament.widgets.world-clock-widget';

    protected array $cities;

    protected static ?string $pollingInterval = '60s';

    protected static function getPluginInstance(): ?FilamentWorldClockPlugin
    {
        try {
            return Filament::getCurrentOrDefaultPanel()?->getPlugin('filament-world-clock');
        } catch (\Exception $e) {
            return null;
        }
    }

    public function __construct()
    {
        $timezones = [
            'Asia/Tokyo',
            'America/New_York',
            'America/Los_Angeles',
        ];

        $plugin = static::getPluginInstance();

        if ($plugin?->getTimezones()) {
            $timezones = $plugin->getTimezones();
        }

        $timeFormat = $plugin?->getTimeFormat() ?? 'H:i';

        $times = [];
        foreach ($timezones as $timezone) {

            $time = Carbon::now($timezone);
            $name = explode('/', $time->getTimezone()->getName())[1];
            $name = str_replace('_', ' ', $name);
            $hour = (int) $time->format('H');

            $offset = $time->getOffset();
            $hours = intdiv($offset, 3600);
            $minutes = abs($offset % 3600 / 60);
            $gmtOffset = sprintf('GMT %+d:%02d', $hours, $minutes);

            $times[] = [
                'name' => __(ucwords($name)),
                'time' => $time->format($timeFormat),
                'flag' => FlagsHelper::get($timezone),
                'night' => $hour > 17 || $hour <= 6 ? true : false,
                'timezone' => $gmtOffset,
            ];
        }

        $this->cities = $times;
    }

    public function shouldShowTitle(): bool
    {
        return static::getPluginInstance()?->getShouldShowTitle() ?? true;
    }

    public function title()
    {
        return static::getPluginInstance()?->getTitle();
    }

    public function description()
    {
        return static::getPluginInstance()?->getDescription();
    }

    public function quantityPerRow()
    {
        return static::getPluginInstance()?->getQuantityPerRow();
    }

    public static function getSort(): int
    {
        return static::getPluginInstance()?->getSort() ?? -1;
    }

    public function getColumnSpan(): int | string | array
    {
        return static::getPluginInstance()?->getColumnSpan() ?? '1/2';
    }

    public function render(): View
    {
        return view($this->view, [
            'cities' => $this->cities,
            'shouldShowTitle' => $this->shouldShowTitle(),
            'title' => $this->title(),
            'description' => $this->description(),
            'quantityPerRow' => $this->quantityPerRow() ?? '1',
        ]);
    }
}
