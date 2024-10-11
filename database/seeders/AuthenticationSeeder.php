<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthenticationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123123'),
            'temp_password' => '123123123',
            'contact_no' => '0312-0000000',
            'address' => 'Faisalabad,Pakistan',
            'is_active' => 1,
            'is_admin' => 1,
            'email_verified_at' => now(),
            'is_email_verified' => 1,
            "role" => 'Admin',
        ]);
        Category::create([
            "name" => 'Silver',
            "description" => 'Lorem ipsum Dollar',
            "added_from" => $user->id,
        ]);
    }
}
