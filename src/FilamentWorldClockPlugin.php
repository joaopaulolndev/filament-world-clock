<?php

namespace Joaopaulolndev\FilamentWorldClock;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Joaopaulolndev\FilamentWorldClock\Widgets\WorldClockWidget;

class FilamentWorldClockPlugin implements Plugin
{
    use EvaluatesClosures;

    public Closure | bool $shouldShowTitle = true;

    public Closure | int $quantityPerRow = 1;

    public Closure | string $timeFormat = 'H:i';

    public Closure | null | int $sort = null;

    public int | string | array $columnSpan = '1/2';

    public array $timezones = [];

    public function getId(): string
    {
        return 'filament-world-clock';
    }

    public function register(Panel $panel): void
    {
        $panel->widgets([
            WorldClockWidget::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function shouldShowTitle(Closure | bool $value = true): static
    {
        $this->shouldShowTitle = $value;

        return $this;
    }

    public function getShouldShowTitle(): bool
    {
        return $this->evaluate($this->shouldShowTitle);
    }

    public function setTitle(Closure | string $value = ''): static
    {
        $this->title = $value;

        return $this;
    }

    public function getTitle(): ?string
    {
        return ! empty($this->title) ? $this->evaluate($this->title) : null;
    }

    public function setDescription(Closure | string $value = ''): static
    {
        $this->description = $value;

        return $this;
    }

    public function getDescription(): ?string
    {
        return ! empty($this->description) ? $this->evaluate($this->description) : null;
    }

    public function timezones(array $timezones = []): static
    {
        $this->timezones = $timezones;

        return $this;
    }

    public function getTimezones(): ?array
    {
        return $this->evaluate($this->timezones);
    }

    public function setQuantityPerRow(Closure | int $value = 1): static
    {
        if ($value < 1) {
            $value = 1;
        }
        if ($value > 12) {
            $value = 12;
        }
        $this->quantityPerRow = $value;

        return $this;
    }

    public function getQuantityPerRow(): ?int
    {
        return $this->evaluate($this->quantityPerRow);
    }

    public function setTimeFormat(Closure | string $value = 'H:i'): static
    {
        $this->timeFormat = $value;

        return $this;
    }

    public function getTimeFormat(): ?string
    {
        return $this->evaluate($this->timeFormat);
    }

    public function setSort(Closure | int | null $value = null): static
    {
        $this->sort = $value;

        return $this;
    }

    public function getSort(): ?int
    {
        return $this->evaluate($this->sort);
    }

    public function setColumnSpan(int | string | array $value = '1/2'): static
    {
        $this->columnSpan = $value;

        return $this;
    }

    public function getColumnSpan(): int | string | array
    {
        return $this->evaluate($this->columnSpan);
    }
}
