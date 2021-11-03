<?php

namespace Astrogoat\Promobar;

use Astrogoat\Promobar\Http\Livewire\Payload;
use Astrogoat\Promobar\Settings\PromobarSettings;
use Helix\Lego\Apps\App;
use Helix\Lego\LegoManager;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PromobarServiceProvider extends PackageServiceProvider
{
    public function registerApp(App $app)
    {
        return $app
            ->name('promobar')
            ->settings(PromobarSettings::class)
            ->migrations([
                __DIR__ . '/../database/migrations/settings',
            ]);
    }

    public function registeringPackage()
    {
        $this->app->singleton(Promobar::class, fn () => new Promobar());

        $this->callAfterResolving('lego', function (LegoManager $lego) {
            $lego->registerApp(fn (App $app) => $this->registerApp($app));
        });
    }

    public function bootingPackage()
    {
        Blade::componentNamespace('Astrogoat\\Promobar\\View\\Components', 'promobar');

        Livewire::component('astrogoat.promobar.payload', Payload::class);
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('promobar')
            ->hasViews();
    }
}
