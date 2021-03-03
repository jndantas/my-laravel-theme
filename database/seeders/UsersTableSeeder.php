<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin admn',
            'email' => 'admin@admin.com',
            'type' => 'admin',
            'status' => 'active',
            'password' => Hash::make('password')
        ]);

        $editor = User::create([
            'name' => 'Editor edita',
            'email' => 'editor@editor.com',
            'type' => 'editor',
            'status' => 'active',
            'created_by' => $admin->id,
            'password' => Hash::make('password')
        ]);

        $view = User::create([
            'name' => 'Visualizador sistema',
            'email' => 'view@view.com',
            'type' => 'view',
            'status' => 'active',
            'created_by' => $admin->id,
            'password' => Hash::make('password')
        ]);
    }
}
