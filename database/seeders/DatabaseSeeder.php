<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $product = Product::factory()->count(10)->create();

        Category::factory()->count(7)->hasAttached($product->skip(1)->take(2))->create();


        Customer::factory()->count(10)
            ->has(Order::factory()->count(2)
            ->hasAttached($product->skip(1)->take(4)))
            ->create();


        DB::table('users')->insert([
            'name'=>'MaryamHefazi',
            'email'=>'maryamhefazi@gmail.com',
            'password'=>Hash::make('123456')
        ]);

    }
}
