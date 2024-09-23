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

    public function postMultipart(string $url, array $data = [], array $headers = [])
    {
        $multipartData = [];

        foreach ($data as $key => $value) {
            if ($key === 'gambar' && is_string($value) && file_exists($value)) {
                $multipartData[] = [
                    'name'     => $key,
                    'contents' => fopen($value, 'r'),
                    'filename' => basename($value)
                ];
            } else {
                $multipartData[] = [
                    'name'     => $key,
                    'contents' => $value
                ];
            }
        }

        // Mengirim data sebagai multipart/form-data
        return Http::withHeaders($headers)->post($url, [
            'multipart' => $multipartData
        ]);
    }
}
