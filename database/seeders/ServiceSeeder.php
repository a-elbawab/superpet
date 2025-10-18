<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;


class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::query()->delete();
        $this->call(PetBoardingSeeder::class);
    }
}
