<?php

namespace Joaopaulolndev\FilamentWorldClock;

use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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
            ->hasAssets()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->askToStarRepoOnGitHub('joaopaulolndev/filament-world-clock');
            });

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageBooted(): void
    {
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName()
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'Joaopaulolndev/filament-world-clock';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            Css::make('filament-world-clock-styles', __DIR__ . '/../resources/build/filament-world-clock.css'),
        ];
    }
}
