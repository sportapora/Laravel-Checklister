<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'title' => 'Welcome',
            'content' => 'Welcome',
        ]);
        
        Page::create([
            'title' => 'Get Consultation',
            'content' => 'Get Consultation',
        ]);
    }
}
