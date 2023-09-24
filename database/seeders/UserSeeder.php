<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'first_name' => 'Super',
      'last_name' => 'Admin',
      'email' => 'sadmin@store.com',
      'password' => Hash::make('1234'),
      'role' => 'admin',
      'super_admin' => 1,
      'status' => '1',
      'email_verified_at' => date(now()),
      'mobile_verified_at' => date(now()),
      'created_by' => 1,
    ]);
  }
}
