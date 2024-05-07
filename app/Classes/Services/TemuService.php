<?php

namespace App\Classes\Services;

use Illuminate\Support\Facades\Http;

class TemuService
{
    public function getDetailProduct($goodsId)
    {
        try {
            $response = Http::withHeaders([
                'X-RapidAPI-Host' => 'temu-com-shopping-api-realtime-api-scrapper-from-temu-com.p.rapidapi.com',
                'X-RapidAPI-Key' => '8b113585e6msh23bad4a5f98a695p1a3d5fjsnbe2e33af5102' // key
            ])->get('https://temu-com-shopping-api-realtime-api-scrapper-from-temu-com.p.rapidapi.com/details', [
                "goodsId" => $goodsId
            ]);
    
            $content = json_decode($response->body(), true);
    
            if (!isset($content['data']['details']['name'])) {
                return null;
            }
            $imgs = [];
            foreach ($content['data']['details']['image'] as $image) {
                $imgs[] = $image['contentURL'];
            }
    
            return [
                "name"  => str_replace("&#39;", "'", $$content['data']['details']['name']),
                "price" => $content['data']['offers']['price'],
                "imgs" => $imgs
            ];
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function getGoodId($url)
    {
        $desired_part = '';
        // Phân tích URL
        $url_parts = parse_url($url);

        // Trích xuất đường dẫn path
        $path = $url_parts['path'];

        // Tìm vị trí của "-g-"
        $start_pos = strpos($path, "-g-");

        if ($start_pos !== false) {
            // Tìm vị trí của "?" hoặc ".html" sau "-g-"
            $end_pos = strpos($path, "?", $start_pos) ?: strpos($path, ".html", $start_pos);

            if ($end_pos !== false) {
                // Trích xuất phần mong muốn
                $desired_part = substr($path, $start_pos + strlen("-g-"), $end_pos - $start_pos - strlen("-g-"));
            } else {
                // Nếu không tìm thấy "?" hoặc ".html", chỉ trích xuất từ "-g-" đến cuối
                $desired_part = substr($path, $start_pos + strlen("-g-"));
            }
        }
        return $desired_part;
    }
}
