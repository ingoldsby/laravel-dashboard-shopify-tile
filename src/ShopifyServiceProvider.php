<?php

namespace Ingoldsby\ShopifyTile;

use Illuminate\Support\ServiceProvider;
use Ingoldsby\ShopifyTile\ShopifyStore;
use Ingoldsby\ShopifyTile\Commands\FetchShopifyInfoCommand;
use Ingoldsby\ShopifyTile\Components\ShopifyComponent;
use Livewire\Livewire;

class ShopifyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchShopifyInfoCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-shopify-tiles'),
        ], 'dashboard-shopify-tiles');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-shopify-tiles');

        Livewire::component('shopify-tile', ShopifyComponent::class);
        
    }
}
