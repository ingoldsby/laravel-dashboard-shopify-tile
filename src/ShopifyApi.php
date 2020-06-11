<?php

namespace Ingoldsby\ShopifyTile;

use Illuminate\Support\Facades\Http;

class ShopifyApi
{

    const ORDERS_FIELDS = '&fields=id,created_at,name,subtotal_price,currency';
    const CUSTOMERS_FIELDS = '&fields=id,created_at,first_name';
    const CHECKOUTS_FIELDS = '&fields=id,created_at,total_line_items_price,presentment_currency';

    public static function getShopifyInfo(string $endpoint, string $type = 'count', int $id = null)
    {

        $baseUrl = 'https://' . config('dashboard.tiles.shopify.api_key') . ':' . config('dashboard.tiles.shopify.password') . '@' . config('dashboard.tiles.shopify.store') . '/admin/api/' . config('dashboard.tiles.shopify.api_version');
        
        $url = self::generateUrl($baseUrl, $endpoint, $type);

        $response = Http::get($url)->json();

        if ($type == 'count') {
            return $response['count'];
        }

        if (isset($response[$endpoint][0])) {
            return $response[$endpoint][0];
        }

        return [];

    }

    public static function generateUrl(string $url, string $endpoint, string $type) : string
    {

        $url = $url . '/' . $endpoint;

        if ($type == 'count') {
            $url = $url . '/' . $type;
        }

        $url = $url . '.json';

        if ($type == 'latest') {
            $url = $url . '?limit=1';

            switch ($endpoint) {
                case 'orders':
                    $url = $url . self::ORDERS_FIELDS;
                    break;
                case 'customers':
                    $url = $url . self::CUSTOMERS_FIELDS;
                    break;
                case 'checkouts':
                    $url = $url . self::CHECKOUTS_FIELDS;
                    break;
            }

        }

        return $url;

    }

}