<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{
    User,
    Role,
    Permission
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name'=>'Admin','email'=>'admin@email.com','password'=>bcrypt('abcd12345')],
            ['name'=>'User','email'=>'user@email.com','password'=>bcrypt('abcd12345')],
            ['name'=>'Editor','email'=>'editor@email.com','password'=>bcrypt('abcd12345')],
            ['name'=>'Author','email'=>'author@email.com','password'=>bcrypt('abcd12345')],
        ]);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
			['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);

        Permission::insert([
            ['name'=>'Add Post','slug'=>'add-post'],
            ['name'=>'Delete Post','slug'=>'delete-post'],
        ]);


    }
}
