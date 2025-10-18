<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('areas')->delete();
        $cities = require __DIR__ . '/cities/iq.php';

        foreach ($cities as $city) {
            $city = City::whereTranslationLike('name', "%" . $city["name:en"] . "%")->first();
            ! empty($city["name:en"]) ? $file =  __DIR__ . '/areas/'. $city["name:en"] .'.php' : $file=null;
            is_file($file) ? $areas = require $file : $areas = null;
            if ($city && is_array($areas)) {
                foreach ($areas as $area) {
                    $city->areas()->create($area);
                }
            }
        }
    }
}
