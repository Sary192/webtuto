<?php

class UserTableSeeder extends Seeder {

	public function run(){
		//DB::table('users')->delete();


		$users = [
            ['name' => 'Admin', 'surname1' => '',  'surname2' => '',  'email' => 'admin@uniovi.es', 'password' => Hash::make('admin13'), 'role' => '1', 'activated' => '1'],
            ['name' => 'Prueba', 'surname1' => '',  'surname2' => '', 'email' => 'prueba@uniovi.es', 'password' => Hash::make('prueba'), 'role' => '0', 'activated' => '0']
        ];

        /*
		User::create(array(
			'name' => 'Admin',
			'surname1' => '',
			'surname2' => '',
			'email' => 'admin@uniovi.es',
			'password' => Hash::make('admin13'),
			'role' => '1',
			'activated' => '1'
		));

		User::create(array(
			'name' => 'Prueba',
			'surname1' => '',
			'surname2' => '',
			'email' => 'prueba@uniovi.es',
			'password' => Hash::make('prueba'),
			'role' => '0',
			'activated' => '0'
		));*/

		DB::table('users')->insert($users);
	}
}