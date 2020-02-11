<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'Carlos Abrisqueta';
        $admin->email = 'iescierva.carlos@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->save();

        $admin = new User;
        $admin->name = 'Pepe Sánchez';
        $admin->email = 'pepe@iescierva.net';
        $admin->password = bcrypt('123456');
        $admin->save();

        $users = factory(User::class, 8)->create();
    }
}
