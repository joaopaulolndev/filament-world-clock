<?php

namespace Joaopaulolndev\FilamentWorldClock;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Joaopaulolndev\FilamentWorldClock\Commands\FilamentWorldClockCommand;
use Joaopaulolndev\FilamentWorldClock\Testing\TestsFilamentWorldClock;

class FilamentWorldClockServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-world-clock';

    public static string $viewNamespace = 'filament-world-clock';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('joaopaulolndev/filament-world-clock');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
//        FilamentAsset::register(
//            $this->getAssets(),
//            $this->getAssetPackageName()
//        );

//        FilamentAsset::registerScriptData(
//            $this->getScriptData(),
//            $this->getAssetPackageName()
//        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-world-clock/{$file->getFilename()}"),
                ], 'filament-world-clock-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFilamentWorldClock());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'joaopaulolndev/filament-world-clock';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-world-clock', __DIR__ . '/../resources/dist/components/filament-world-clock.js'),
            Css::make('filament-world-clock-styles', __DIR__ . '/../resources/dist/filament-world-clock.css'),
            Js::make('filament-world-clock-scripts', __DIR__ . '/../resources/dist/filament-world-clock.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentWorldClockCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_filament-world-clock_table',
        ];
    }
}
