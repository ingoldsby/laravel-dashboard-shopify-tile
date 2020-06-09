<?php

namespace Ingoldsby\ShopifyTile\Commands;

use Illuminate\Console\Command;
use Ingoldsby\ShopifyTile\ShopifyApi;
use Ingoldsby\ShopifyTile\ShopifyStore;

class FetchShopifyInfoCommand extends Command
{
    protected $signature = 'dashboard:fetch-shopify-information';

    protected $description = 'Fetch Shopify Information';

    public function handle(ShopifyApi $api)
    {
        $this->info('Fetching Shopify Info ...');

        $response['customers']['count'] = $api->getShopifyInfo('customers', 'count');
        $response['customers']['latest'] = $api->getShopifyInfo('customers', 'latest');

        $response['orders']['count'] = $api->getShopifyInfo('orders', 'count');
        $response['orders']['latest'] = $api->getShopifyInfo('orders', 'latest');

        $response['checkouts']['count'] = $api->getShopifyInfo('checkouts', 'count');
        $response['checkouts']['latest'] = $api->getShopifyInfo('checkouts', 'latest');

        $response['products']['count'] = $api->getShopifyInfo('products', 'count');
        $response['products']['latest'] = $api->getShopifyInfo('products', 'latest');

        ShopifyStore::make()->setShopifyInfo($response);

        $this->info('All done!');
    }
}