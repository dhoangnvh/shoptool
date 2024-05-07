<?php

namespace App\Classes\Services;

use Illuminate\Support\Facades\Http;

class ShopifyService
{
    public function createProduct($data)
    {
        $images = [];
        foreach ($data['images'] as $image) {
            if (trim($image) != "") {
                $images[] = ["src" => trim($image)];
            }
        }
        $data = [
            "product" => [
                "title"     => $data['name'],
                "body_html" => $data['description'],
                // "vendor"    => "Burton",
                // "product_type"  => "Snowboard",
                "status"    => "draft",
                "tags"      => "Snow, Winter",
                "variants"  => [
                    ["option1" => "Blue","price" => "10.00","sku" => "111","option2" => "155","option3" => "22"],
                    ["option1" => "Black","price" => "20.00","sku" => "112","option2" => "159","option3" => "33"],
                ],
                "images"    => $images,
            ]
        ];
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => 'shpua_7f1721b358f9737f753d8b76ce31eab9',
            'Content-Type' => 'application/json'
        ])->withBody(
            json_encode($data, true), 'application/json'
        )->post('https://quickstart-5a7222dc.myshopify.com/admin/api/2024-01/products.json');
    }
}
