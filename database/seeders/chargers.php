<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chargers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {


        $data = json_decode('[
                {
        "id": 1,
        "localisation": {
            "city": "Jelenia Góra",
            "street": "Józefa Piłsudskiego",
            "number": "15",
            "comment": ""
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "CHAdeMO",
        "power": 11,
        "price": 3
    },
    {
        "id": 2,
        "localisation": {
            "city": "Karpacz",
            "street": "Batorego",
            "number": "66",
            "comment": ""
        },
        "status": "unavailable",
        "closestTerm": {
            "time": "12:00",
            "date": "25/03/2023"
        },
        "standard": "CCS",
        "power": 22,
        "price": 4
    },
    {
        "id": 3,
        "localisation": {
            "city": "Szklarska Poręba",
            "street": "Mickiewicza",
            "number": "30",
            "comment": "Biedronka"
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "CHAdeMO",
        "power": 12,
        "price": 3.5
    },
    {
        "id": 4,
        "localisation": {
            "city": "Wałbrzych",
            "street": "Piastów",
            "number": "5",
            "comment": ""
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "CCS",
        "power": 24,
        "price": 4.2
    },
    {
        "id": 5,
        "localisation": {
            "city": "Legnica",
            "street": "Kościuszki",
            "number": "18",
            "comment": ""
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "CHAdeMO",
        "power": 10,
        "price": 3.2
    },
    {
        "id": 6,
        "localisation": {
            "city": "Głogów",
            "street": "Sienkiewicza",
            "number": "7",
            "comment": "Orlen"
        },
        "status": "unavailable",
        "closestTerm": {
            "time": "14:30",
            "date": "28/03/2023"
        },
        "standard": "CCS",
        "power": 20,
        "price": 4.5
    },
    {
        "id": 7,
        "localisation": {
            "city": "Zgorzelec",
            "street": "Zamkowa",
            "number": "42",
            "comment": "Lewiatan"
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "CHAdeMO",
        "power": 11.5,
        "price": 3.7
    },
    {
        "id": 8,
        "localisation": {
            "city": "Jawor",
            "street": "Słowackiego",
            "number": "3",
            "comment": ""
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "CCS",
        "power": 23,
        "price": 4.1
    },
    {
        "id": 9,
        "localisation": {
            "city": "Świdnica",
            "street": "Piłsudskiego",
            "number": "10",
            "comment": "Orlen"
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "CHAdeMO",
        "power": 13,
        "price": 3.8
    },
    {
        "id": 10,
        "localisation": {
            "city": "Lubań",
            "street": "Kopernika",
            "number": "22",
            "comment": "Lubań Plaza"
        },
        "status": "unavailable",
        "closestTerm": {
            "time": "11:15",
            "date": "30/03/2023"
        },
        "standard": "CCS",
        "power": 21,
        "price": 4.3
    },
    {
        "id": 11,
        "localisation": {
            "city": "Góra",
            "street": "Polna",
            "number": "9",
            "comment": ""
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "Tesla Supercharger",
        "power": 50,
        "price": 5
    },
    {
        "id": 12,
        "localisation": {
            "city": "Oleśnica",
            "street": "Wrocławska",
            "number": "17",
            "comment": ""
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "Tesla Supercharger",
        "power": 50,
        "price": 5
    },
    {
        "id": 13,
        "localisation": {
            "city": "Wrocław",
            "street": "Nowy Świat",
            "number": "7",
            "comment": ""
        },
        "status": "available",
        "closestTerm": {
            "time": "",
            "date": ""
        },
        "standard": "Tesla Supercharger",
        "power": 50,
        "price": 5
    }
        ]', true);

        foreach ($data as $item) {
            DB::table('ladowarki')->insert([
                'id' => $item['id'],
                'city' => $item['localisation']['city'],
                'street' => $item['localisation']['street'],
                'number' => $item['localisation']['number'],
                'comment' => $item['localisation']['comment'],
                'status' => $item['status'],
                'closestTerm_time' => $item['closestTerm']['time'],
                'closestTerm_date' => $item['closestTerm']['date'],
                'standard' => $item['standard'],
                'power' => $item['power'],
                'price' => $item['price'],
            ]);
        }
    }
}
