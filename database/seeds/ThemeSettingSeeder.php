<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ThemeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('theme_settings')->insert([
            'hd_fevicon' => 'favicon.ico',
            'hd_theme' => 'default',
            'hd_title' => 'WebEasy Pvt Ltd - is a brand & digital communication agency. ',
            'hd_phone' => '+92 333 4955655',
            'hd_email' => 'Info@wearewebeasy.com',
            'hd_img_logo' => 'logo.jpg',
            'hd_address' => '61 Commercial Plaza, 1st Floor Cavalry Ground, Lahore, 54810, Pakistan.',
            'hd_developer_name' => 'WebEasy (Pvt) Ltd.',
            'hd_developer_site_url' => 'https://wearewebeasy.com/',
        ]);
    }
}
