<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer','display_name' => 'Escritor']);
        $defaultRole = Role::create(['name' => 'Default','display_name' => 'Predeterminado']);

        $viewPostPermission = Permission::create(['name' => 'View posts']);
        $createPostPermission = Permission::create(['name' => 'Create posts']);
        $updatePostPermission = Permission::create(['name' => 'Update posts']);
        $deletePostPermission = Permission::create(['name' => 'Delete posts']);

        $viewUserPermission = Permission::create(['name' => 'View users']);
        $createUserPermission = Permission::create(['name' => 'Create users']);
        $updateUserPermission = Permission::create(['name' => 'Update users']);
        $deleteUserPermission = Permission::create(['name' => 'Delete users']);

        $admin = new User;
        $admin->name = 'Carlos Abrisqueta';
        $admin->email = 'iescierva.carlos@gmail.com';
        $admin->password = '123456';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Pepe Sánchez';
        $writer->email = 'pepe@iescierva.net';
        $writer->password = '123456';
        $writer->save();

        $writer->assignRole($adminRole);
        $writer->assignRole($writerRole);

        $user = new User;
        $user->name = 'Victor';
        $user->email = 'victor@iescierva.net';
        $user->password = '123456';
        $user->save();

        $user->assignRole($defaultRole);

        $users = factory(User::class, 8)->make();

        $users->each(function ($u) use($writerRole) {
            $u->save();
            $u->assignRole($writerRole);


        });


    }
}
