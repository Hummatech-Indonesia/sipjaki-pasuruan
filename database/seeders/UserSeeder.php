<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Faker\Provider\Uuid;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (Role::all() as $role) {
            $profile = User::query()
                ->create([
                    'id' => Uuid::uuid(),
                    'name' => $role['name'],
                    'phone_number' => $faker->phoneNumber,
                    'email' => str_replace(' ', '', $role['name']) . "@gmail.com",
                    'password' => bcrypt('password'),
                    'email_verified_at' => now()
                ]);

            $profile->assignRole($role);
        }
    }
}
