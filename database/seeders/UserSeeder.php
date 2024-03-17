<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Lead;
use App\Models\Listing;
use App\Models\Owner;
use App\Models\DataPool;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $superAdmin = User::create([
            'code'=>generateAlphaNumeric(4),
            'first_name' => 'Fraz',
            'last_name' => 'Shabbir',
            'email' => 'fraz@wallet.com',
            'phone' => '1234567890',
            'password' => Hash::make('12345678'),
            'status' => 1,
            'email_verified_at' => '2022-01-02 17:04:58',
            'avatar' => 'avatar-1.jpg',
            'hash' => genHash(),
            'created_at' => now()
        ]);
        $superAdmin->assignRole('Super Admin');

        $superAdmin = User::create([
            'code'=>generateAlphaNumeric(4),
            'first_name' => 'User',
            'last_name' => '1',
            'email' => 'user1@wallet.com',
            'phone' => '1234567890',
            'password' => Hash::make('12345678'),
            'status' => 1,
            'email_verified_at' => '2022-01-02 17:04:58',
            'avatar' => 'avatar-1.jpg',
            'hash' => genHash(),
            'created_at' => now()
        ]);
        $superAdmin->assignRole('User');
        $superAdmin = User::create([
            'code'=>generateAlphaNumeric(4),
            'first_name' => 'User',
            'last_name' => '2',
            'email' => 'user2@wallet.com',
            'phone' => '1234567890',
            'password' => Hash::make('12345678'),
            'status' => 1,
            'email_verified_at' => '2022-01-02 17:04:58',
            'avatar' => 'avatar-1.jpg',
            'hash' => genHash(),

            'created_at' => now()
        ]);
        $superAdmin->assignRole('User');
        $superAdmin = User::create([
            'code'=>generateAlphaNumeric(4),
            'first_name' => 'User',
            'last_name' => '3',
            'email' => 'user3@wallet.com',
            'phone' => '1234567890',
            'password' => Hash::make('12345678'),
            'status' => 1,
            'email_verified_at' => '2022-01-02 17:04:58',
            'avatar' => 'avatar-1.jpg',
            'hash' => genHash(),
            'created_at' => now()
        ]);
        $superAdmin->assignRole('User');
    }
}
