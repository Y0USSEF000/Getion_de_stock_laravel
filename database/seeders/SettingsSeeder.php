<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    public function run()
    {
        Setting::updateOrCreate(['key' => 'site_name'], ['value' => 'My Awesome Site']);
        Setting::updateOrCreate(['key' => 'contact_email'], ['value' => 'admin@example.com']);
        Setting::updateOrCreate(['key' => 'maintenance_mode'], ['value' => '0']);
    }
}