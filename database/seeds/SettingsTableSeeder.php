<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name'=>"Laravel Blog 2021",
            'contact_phone'=>"+963 938181296",
            'contact_email'=>"Laravel@gmail.com",
            'address'=>"Homs"

        ]);
    }
}
