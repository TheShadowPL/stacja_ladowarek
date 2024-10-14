<?php

namespace App\Services;

use GuzzleHttp\Client;

class OpenStreetMapService
{
    protected $apiUrl = 'https://nominatim.openstreetmap.org/search';

    public function getCoordinates($address)
    {
        $client = new Client();

        $response = $client->request('GET', $this->apiUrl, [
            'query' => [
                'format' => 'json',
                'q' => $address,
            ],
            'headers' => [
                'User-Agent' => 'PlugAndGo/1.0 (krystian.tomczyk813@gmail.com)', 
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        if (isset($data[0]['lat']) && isset($data[0]['lon'])) {
            return [
                'latitude' => $data[0]['lat'],
                'longitude' => $data[0]['lon'],
            ];
        }

        return null;
    }
}