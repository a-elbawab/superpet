<?php

namespace Database\Seeders;

use App\Models\Input;
use Illuminate\Database\Seeder;

class InputSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Input::factory()->count(3)->create();
    }
}
