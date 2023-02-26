<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserProfile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        $admin_profiles = UserProfile::create([
            'contact' => '08098928',
            'user_id' => $admin->id,
            // 'image_path' => assets('images/logo-diskominfotik-bna.png'),
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);
        $user_profiles = UserProfile::create([
            'contact' => '97239089',
            'user_id' => $user->id,
        ]);
        $user->assignRole('user');
    }
}
