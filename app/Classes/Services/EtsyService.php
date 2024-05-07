<?php

namespace App\Classes\Services;

use Goutte\Client;

class EtsyService
{
    public function cralerEtsy($url)
    {
        $productAttrs = [];
        $client = new Client();

        $client->getCookieJar()->set(
            new \Symfony\Component\BrowserKit\Cookie('user_prefs', 'JpeCtJDNqjvujEj8_5JWLon_cSJjZACCNLXMxzA6WinMz0VJJ680J0dHKTVPNzRYSQcoBBUxglC4iFgGAA..', strtotime('2025-04-22T13:45:07.922Z'))
        );

        $crawler = $client->request('GET', $url);

        // dd($crawler->html());

        $a = $crawler->html();

        $b = 1;

        $crawler->filter('#listing-page-cart .wt-text-body-01.wt-line-height-tight')->each(function ($node) use (&$productAttrs) {
            $productAttrs['name'] = $node->text();
        });

        $crawler->filter('#listing-page-cart .wt-text-title-larger')->each(function ($node) use (&$productAttrs) {
            $productAttrs['price'] = floatval(str_replace([","], "", $node->text()));
        });

        $crawler->filter('#listing-page-cart .wt-text-strikethrough')->each(function ($node) use (&$productAttrs) {
            $productAttrs['price'] = floatval(str_replace([","], "", $node->text()));
        });

        $crawler->filter('.listing-page-image-carousel-component .carousel-image')->each(function ($node) use (&$productAttrs) {
            $productAttrs['imgs'][] = $node->attr('src');
        });

        return $productAttrs;
    }
}
