<?php

class TuringMachineTableSeeder extends Seeder {

	public function run(){

		$machines = [
            ['user_id' => '1', 'name' => 'x+y',  'state' => '2',  'description' => 'x+y....', 'data' => '0,1#0,1,2#0#2#5#000D0,010D1,111D1,100D2,210H2#01110110'],
            ['user_id' => '1', 'name' => '2x',  'state' => '2',  'description' => '2x....', 'data' => '0,1#0,1,2,3,4,5,f#0#f#12#000D0,010D1,110D2,100Hf,211D2,200D3,301I4,311D3,400I5,411I4,511I5,501D1#011110000']
        ];

		DB::table('turing_machines')->insert($machines);
	}
}