<?php

namespace App\Services;

use GuzzleHttp\Client;

class DropboxService
{
    protected $client;
    protected $accessToken;

    public function __construct()
    {
        $this->client = new Client();
        $this->accessToken = env('DROPBOX_ACCESS_TOKEN');
    }

    public function listFiles($path = '')
    {
        $response = $this->client->post('https://api.dropboxapi.com/2/files/list_folder', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'path' => $path,
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getFile($filePath)
    {
        $response = $this->client->post('https://content.dropboxapi.com/2/files/download', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->accessToken,
                'Dropbox-API-Arg' => json_encode(['path' => $filePath]),
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
