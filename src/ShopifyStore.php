<?php

namespace Ingoldsby\ShopifyTile;

use Spatie\Dashboard\Models\Tile;

class ShopifyStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("shopify");
    }

    public function setShopifyInfo($info) : self
    {
        $this->tile->putData('shopify', $info);

        return $this;
    }

    public function getShopifyInfo()
    {
        return $this->tile->getData('shopify') ?? [];
    }

}
