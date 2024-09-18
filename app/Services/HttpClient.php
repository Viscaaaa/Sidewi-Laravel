<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Contracts\HttpClientInterface;

class HttpClient implements HttpClientInterface
{
    public function get($url, $headers = [])
    {
        return Http::withHeaders($headers)->get($url);
    }

    public function post($url, array $data, $headers = [])
    {
        return Http::withHeaders($headers)->post($url, $data);
    }

    public function put($url, array $data, $headers = [])
    {
        return Http::withHeaders($headers)->put($url, $data);
    }

    public function delete($url, $headers = [])
    {
        return Http::withHeaders($headers)->delete($url);
    }
}
