<?php

class ProfilesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('profiles')->truncate();

		$profiles = array(
            "email"     =>  "mirza.pasic@edu.fit.ba",
            "password"  =>  Hash::make("test123")
		);

        Profile::create( $profiles );

		// Uncomment the below to run the seeder
		// DB::table('profiles')->insert($profiles);
	}

}
