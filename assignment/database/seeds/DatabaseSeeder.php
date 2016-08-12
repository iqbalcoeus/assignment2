<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // DB::table('users')->insert([
        //     'name' => str_random(10),
        //     'email' => str_random(10).'@gmail.com',
        //     'password' => bcrypt('secret'),
        // ]);
        for($count=1;$count<=3; $count++ ){
	        DB::table('users')->insert([
	            'name' => 'admin'.$count,
	            'email' => 'admin'.$count.'@gmail.com',
	            'password' => bcrypt('admin'),
	            'admin'	=>1,
	        ]);
        }
        // DB::table('projects')->insert([
        //     'title' => str_random(10),
        //     'description' => str_random(100),
        //     'status' => 'open',
        //     'category' => 'Web',
        // ]);        
        // DB::table('tasks')->insert([
        //     'title' => str_random(10),
        //     'description' => str_random(100),
        //     'status' => 'in progress',
        //     'category' => 'Front-End',
        //     'project_id'=>1
        // ]);
        // DB::table('task_user')->insert([
        // 	'task_id' => 1,
        // 	'user_id'	=> 1,

        // 	]);
    }
}
