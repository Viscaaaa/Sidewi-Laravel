<?php
// app/Services/ApiService.php
namespace App\Services;

use App\Contracts\HttpClientInterface;
use Illuminate\Support\Facades\Http;

class ApiService
{
    protected $baseUrl;
    protected $httpClient;
    protected $token;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->baseUrl = env('API_BASE_URL');
        $this->httpClient = $httpClient;
    }


    public function setToken($token)
    {
        $this->token = $token;
    }

    protected function getHeaders()
    {
        return [
            'Authorization' => "Bearer {$this->token}",
        ];
    }



    public function login($email, $password)
    {
        $response = $this->httpClient->post("{$this->baseUrl}/login", [
            'email' => $email,
            'password' => $password,
        ]);

        return $response->json();
    }

    public function get($endpoint)
    {
        $response = $this->httpClient->get("{$this->baseUrl}/{$endpoint}", $this->getHeaders());
        return $response->json();
    }

    public function post($endpoint, $data)
    {
        $response = $this->httpClient->post("{$this->baseUrl}/{$endpoint}", $data, $this->getHeaders());
        return $response->json();
    }

    public function put($endpoint, $data)
    {
        $response = $this->httpClient->put("{$this->baseUrl}/{$endpoint}", $data, $this->getHeaders());
        return $response->json();
    }

    public function delete($endpoint)
    {
        $response = $this->httpClient->delete("{$this->baseUrl}/{$endpoint}", $this->getHeaders());
        return $response->json();
    }
}
