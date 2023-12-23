<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url_city = 'https://api.rajaongkir.com/starter/city?key=60f6c11db757bc4f4ff8acdac3320987';
        $json_str = file_get_contents($url_city);
        $json_obj = json_decode($json_str);
        $cities = [];
        foreach ($json_obj->rajaongkir->results as $key => $value) {
            $cities[] = [
                'id' => $value->city_id,
                'province_id' => $value->province_id,
                'city' => $value->city_name,
                'type' => $value->type,
                'postal_code' => $value->postal_code
            ];
        }
        DB::table('cities')->insert($cities);
    }
}
