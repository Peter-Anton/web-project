<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\Brief;
use App\Models\Category;
use App\Models\Company;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::factory()->create();
        Admin::factory()->create();
        for ($i = 0; $i < 10; $i++)
        {
            Offer::factory()->has(Brief::factory())->create();
        }

    }
}
