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

        return [
            'status_code' => $response->status(),
            'data' => $response->json()
        ];
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
    public function postDestinasiWisata($endpoint, $data)
    {
        // Memastikan bahwa data adalah array multipart
        $multipartData = [];
        foreach ($data as $key => $value) {
            if ($key === 'gambar') {
                if (isset($value['contents']) && isset($value['filename'])) {
                    $multipartData[] = [
                        'name'     => $key,
                        'contents' => $value['contents'], // Stream resource
                        'filename' => $value['filename']  // Nama file
                    ];
                } else {
                    throw new \Exception("Data gambar tidak lengkap.");
                }
            } else {
                $multipartData[] = [
                    'name'     => $key,
                    'contents' => $value
                ];
            }
        }

        // Kirim request dengan multipart/form-data
        $response = Http::withHeaders($this->getHeaders())
            ->attach('gambar', $multipartData[4]['contents'], $multipartData[4]['filename']) // Attach file
            ->post("{$this->baseUrl}/{$endpoint}", [ // Data form selain file
                'tb_desa_wisatas_id' => $data['tb_desa_wisatas_id'],
                'deskripsi' => $data['deskripsi'],
                'nama' => $data['nama'],
                'slug' => $data['slug'],
            ]);

        return $response->json();
    }

    public function getDesaWisataByAdminId($adminId)
    {
        $endpoint = "desa-wisata/akun/{$adminId}";
        $url = "{$this->baseUrl}/{$endpoint}";
        $response = $this->httpClient->get($url, $this->getHeaders());
        return $response;
    }

    public function getDestinasiWisata($desaId = null)
    {
        $endpoint = $desaId ? "destinasi-wisata?desa_id={$desaId}" : "destinasi-wisata";
        return $this->get($endpoint);
    }

    public function getDestinasiWisataById($id)
    {
        return $this->get("destinasi-wisata/{$id}");
    }

    public function createDestinasiWisata($data)
    {
        return $this->postDestinasiWisata("destinasi", $data);
    }

    public function updateDestinasiWisata($id, $data)
    {
        return $this->put("destinasi-wisata/{$id}", $data);
    }

    public function deleteDestinasiWisata($id)
    {
        return $this->delete("destinasi-wisata/{$id}");
    }
}
