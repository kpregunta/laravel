<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->insert([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('administrator')
        ]);
        for($i=1; $i<=10; $i++){
            DB::table('users')
            ->insert([
                'name' => Str::random(5),
                'email' => 'admin'.$i.'@gmail.com',
                'password' => Hash::make('administrator')
            ]);
        }
        
    }
}
