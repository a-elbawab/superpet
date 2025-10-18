<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FeedbackSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ServiceSeeder::class);

        // $this->call(AttributeSeeder::class);
        // $this->call(InvoiceSeeder::class);
        // $this->call(TagSeeder::class);
        // $this->call(BookingSeeder::class);
        // $this->call(SectionSeeder::class);
        // $this->call(InputSeeder::class);
        // $this->call(OptionSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(HintSeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(CategoryProductSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(GallerySeeder::class);
        /*  The seeders of generated crud will set here: Don't remove this line  */
    }
}
