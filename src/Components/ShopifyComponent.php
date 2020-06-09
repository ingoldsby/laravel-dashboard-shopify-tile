<?php

namespace Ingoldsby\ShopifyTile\Components;

use Ingoldsby\ShopifyTile\ShopifyStore;
use Livewire\Component;

class ShopifyComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        return view('dashboard-shopify-tiles::all.tile', [
            'shopify' => ShopifyStore::make()->getShopifyInfo(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.shopify.refresh_interval_in_seconds') ?? 60,
        ]);
    }
}