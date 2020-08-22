<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::create([

            'first_name' => 'super',
            'last_name' => 'admin',
            'email' => 'superadmin@app.com',
            'password' => bcrypt(123456)

        ]);

        $users->attachRole('super_admin');
    }
}
