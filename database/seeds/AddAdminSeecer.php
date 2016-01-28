<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;
use App\User;

class AddAdminSeecer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    	DB::table('users')->truncate();
    	DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        User::where('username','admin')->delete();
		User::insert(array(
			'name'     => 'admin',
			'email'    => 'rbautista@chasetech.com',
			'username' => 'admin',
			'password' => Hash::make('noisyboy'),
		));

		// $admin = User::where('username', 'admin')->first();
		// $admin->roles()->attach(1);
    }
}
