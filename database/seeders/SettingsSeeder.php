<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'address' => NULL,
            'about' => NULL,
            'email_id' => 'email@mail.com',
            'contact_no' => 1234567890,
            'facebook' => 'https://www.facebook.com',
            'instagram' => 'https://www.instagram.com',
            'twitter' => 'https://www.youtube.com',
            'youtube' => 'https://twitter.com',
            'maps' => 'https://google.com',
        ]);
    }
}
