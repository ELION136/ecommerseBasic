<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    

    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        Storage::deleteDirectory('products'); // Delete the products directory if it exists
        Storage::makeDirectory('products'); // Create the products directory if it doesn't exist
        // User::factory(10)->create();

        User::factory(10)->create([
            'name' => 'John Doe',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'), // Ensure the password is hashed
        ]);



        $this->call([
            familySeeder::class,
        ]);

        Product::factory(100)->create();
    }
}
