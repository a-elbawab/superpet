<?php

namespace Database\Seeders;

use App\Models\Hint;
use Illuminate\Database\Seeder;

class HintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hint::factory()->count(3)->create();
    }
}
