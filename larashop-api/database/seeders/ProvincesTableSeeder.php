<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url_province = 'https://api.rajaongkir.com/starter/province?key=60f6c11db757bc4f4ff8acdac3320987';
        $json_str = file_get_contents($url_province);
        $json_obj = json_decode($json_str);
        $provinces = [];
        foreach ($json_obj->rajaongkir->results as $key => $value) {
            $provinces[] = [
                'id' => $value->province_id,
                'province' => $value->province
            ];
        }
        DB::table('provinces')->insert($provinces);
    }
}
