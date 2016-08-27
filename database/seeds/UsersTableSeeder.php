<?php

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
    	$numberOfPeopleToSeed = 30;

    	// Create Users
	    factory(App\User::class, $numberOfPeopleToSeed)->create();

	    // For easy dev tests only
        $jason = App\User::create([
            'id' => $numberOfPeopleToSeed + 1,
            'email' => 'jasonherndon86@gmail.com',
            'password' => bcrypt('snuffles'),
            'first' => 'Jason',
            'last' => 'Herndon',
            'bio' => 'Developer. Writer. Storyteller. Backpacker.',
            'img' => 'https://pbs.twimg.com/profile_images/735287189601452032/Amstvgi5_400x400.jpg',
            'question' => 'What city were you born in?',
            'answer' => 'New York',
	        'address' => '1234 S Madison Square Avenue',
	        'address_2' => 'Apt 343',
	        'city' => 'New York',
	        'postal' => '10004',
	        'state' => 'NY',
	        'country' => 'USA',
	        'timezone' => 'EST',
	        'phone' => '867-5309',
            'remember_token' => str_random(10),
        ]);
    }
}
