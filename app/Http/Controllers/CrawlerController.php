<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class CrawlerController extends Controller
{
    function cralerEtsy(Request $request)
    {
        $productAttrs = [];
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.etsy.com/listing/1623536505/personalized-vinyl-record-with-photo?ga_order=most_relevant&ga_search_type=all&ga_view_type=gallery&ga_search_query=anniversary+gifts&ref=sr_gallery-1-1&pro=1&sts=1&organic_search_click=1');

        $crawler->filter('#listing-page-cart .wt-text-body-01.wt-line-height-tight')->each(function ($node) use (&$productAttrs) {
            $productAttrs['name'] = $node->text();
        });

        $crawler->filter('#listing-page-cart .wt-text-title-larger')->each(function ($node) use (&$productAttrs) {
            $productAttrs['price1'] = $node->text();
        });

        $crawler->filter('#listing-page-cart .wt-text-strikethrough')->each(function ($node) use (&$productAttrs) {
            $productAttrs['price2'] = $node->text();
        });

        dd($productAttrs);
    }
}
