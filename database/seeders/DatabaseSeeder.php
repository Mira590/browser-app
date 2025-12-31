<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Branch;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 20 random users
        

        // Optional: create a specific admin user
        User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'job_title' => 'System Administrator',
            'username' => 'admin',
            'phone' => '1234567890',
            'azbid' => 'AZB12345',
            'role' => 'admin',
            'bio' => 'I am the main admin.',
            'password' => Hash::make('admin123'),
            'photo' => null,
        ]);
        $branches=[
            ['name'=>'main Branch','br_code'=>'00010'],
            ['name'=>'Sarai Shahzadeh','br_code'=>'00020'],
            ['name'=>'Faryab ','br_code'=>'00270'],
            ['name'=>'Sare-pol','br_code'=>'00460'],
        ];

        foreach($branches as $branch){
            Branch::create($branch);
        }



        $products=[
            ['name'=>'PC'],
            ['name'=>'Router'],
            ['name'=>'Switch '],
            ['name'=>'Firewall'],
        ];

        foreach($products as $product){
            Product::create($product);
        }

         $categories=[
            ['name'=>'Network'],
            ['name'=>'Database'],
            ['name'=>'IT SUPPORT'],
            ['name'=>'System Admin'],
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
