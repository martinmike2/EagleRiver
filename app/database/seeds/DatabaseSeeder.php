<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('EmployeeTableSeeder');
	}

}

class EmployeeTableSeeder extends Seeder{
	public function run()
	{
		DB::table('employees')->delete();
		Employee::create(array('firstName'=>'John', 'lastName'=>'Doe', 'employeeGender'=>'M', 'dateOfHire'=>'23-01-1987 16:05:27', 'terminationDate'=>'01-01-2014 00:00:00'));
		Employee::create(array('firstName'=>'Jane', 'lastName'=>'Doe', 'employeeGender'=>'F', 'dateOfHire'=>'02-03-1997 01:25:56', 'terminationDate'=>'NULL'));
		Employee::create(array('firstName'=>'Daffy', 'lastName'=>'Duck','employeeGender'=>'M', 'dateOfHire'=>'15-05-2014 16:05:27', 'terminationDate'=>'NULL'));	
	}
}

class UserTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->delete();
		User::create(array('username'=>'admin', 'password'=>Hash::make('admin')));
	}
	
}
