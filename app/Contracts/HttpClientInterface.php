<?php

namespace App\Contracts;

interface HttpClientInterface
{

    public function post($url, array $data);
    public function get($url);
    public function put($url, array $data);
    public function delete($url);
    public function postMultipart(string $url, array $data = [], array $headers = []);
}
