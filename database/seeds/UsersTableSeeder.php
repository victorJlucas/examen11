<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $admin = new User;
        $admin->name = 'Carlos Abrisqueta';
        $admin->email = 'iescierva.carlos@gmail.com';
        $admin->password = bcrypt('123456');
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Pepe Sánchez';
        $writer->email = 'pepe@iescierva.net';
        $writer->password = bcrypt('123456');
        $writer->save();

        $writer->assignRole($writerRole);

        $users = factory(User::class, 8)->make();

        $users->each(function ($u) use($writerRole) {
            $u->save();
            $u->assignRole($writerRole);
        });
    }
}
