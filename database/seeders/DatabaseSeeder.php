<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(TypeSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(PermissionsSeeder::class);
        // $this->call(SettingsSeeder::class);
        $this->call(ArticleSeeder::class);
    }
}
