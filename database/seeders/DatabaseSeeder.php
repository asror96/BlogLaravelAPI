<?php

namespace Database\Seeders;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         \App\Models\User::factory()->create([
             'name' => 'Asror',
             'role'=>'admin',
             'email' => 'asror@example.com',
             'password'=>Hash::make('password'),
         ]);
        \App\Models\Post::factory(10)->create();
    }
}
