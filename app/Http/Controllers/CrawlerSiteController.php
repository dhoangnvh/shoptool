<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingSite;
use Goutte\Client;
use App\Classes\Services\EtsyService;
use App\Classes\Services\TemuService;
use App\Classes\Services\ShopifyService;

class CrawlerSiteController extends Controller
{
    protected $etsyService, $temuService, $shopifyService;

    public function __construct(EtsyService $etsyService, TemuService $temuService, ShopifyService $shopifyService)
    {
        $this->etsyService = $etsyService;
        $this->temuService = $temuService;
        $this->shopifyService = $shopifyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settingSite = SettingSite::first();
        $menuAcitve = "crawler";
        return view('crawler', compact('menuAcitve', 'settingSite'));
    }

    public function crawler(Request $request)
    {
        $data = null;
        if (str_contains($request->href, "etsy.com")) {
            $data = $this->etsyService->cralerEtsy($request->href);
        } elseif (str_contains($request->href, "temu.com")) {
            $goodId = $this->temuService->getGoodId($request->href);
            $data = $this->temuService->getDetailProduct($goodId);
        }
        
        return response()->json($data, 200);
    }

    public function createProduct(Request $request)
    {
        $data = [
            "name" => $request->name,
            "description" => nl2br($request->description),
            "images" => explode("\n", $request->images)
        ];
        $a = $this->shopifyService->createProduct($data);
        return redirect()->route('crawler.index')->with('success', 'Đăng ký sản phẩm thành công');
    }
}
