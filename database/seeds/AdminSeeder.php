<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset users table
        DB::table('admin')->truncate();

        // Init data
        $admin = [
            'name' => 'administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'birth_day' => date('Y-m-d', strtotime('10/10/2018')),
            'avatar' => null,
            'role_type' => '1',
            'ins_id' => 1,
            'upd_id' => null,
            'del_flag' => 0,

        ];

        // Insert DB
        DB::table('admin')->insert($admin);
    }
}
