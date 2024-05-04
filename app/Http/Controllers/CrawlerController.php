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

        $client->getCookieJar()->set(
            new \Symfony\Component\BrowserKit\Cookie('user_prefs', 'tINst4I03RaSSEcz_FaC7t-vFMBjZACCNNXHLTA6WinMz0VJJ680J0dHKTVPNzRYSQcoBBUxglC4iFgGAA..')
        );

        $crawler = $client->request('GET', 'https://www.etsy.com/listing/1623536505/personalized-vinyl-record-with-photo');

        $crawler->filter('#listing-page-cart .wt-text-body-01.wt-line-height-tight')->each(function ($node) use (&$productAttrs) {
            $productAttrs['name'] = $node->text();
        });

        $crawler->filter('#listing-page-cart .wt-text-title-larger')->each(function ($node) use (&$productAttrs) {
            $productAttrs['price1'] = $node->text();
        });

        $crawler->filter('#listing-page-cart .wt-text-strikethrough')->each(function ($node) use (&$productAttrs) {
            $productAttrs['price2'] = $node->text();
        });

        $crawler->filter('.listing-page-image-carousel-component .carousel-image')->each(function ($node) use (&$productAttrs) {
            $productAttrs['imgs'][] = $node->attr('src');
        });

        dd($productAttrs);
    }
}
