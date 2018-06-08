<?php
use Illuminate\Database\Seeder;
use App\Doctor;
use Faker\Factory as Faker;

class DoctorTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		Schema::disableForeignKeyConstraints();
		DB::table('doctors')->truncate();

		$faker = Faker::create();

		foreach(range(1,20) as $i){
			Doctor::create([
				'name'=>$faker->word(),
				'document' =>$faker->ipv4()
			]);
		}

		$this->command->info('Doctors Created Successfully!');
		Schema::enableForeignKeyConstraints();
	}
}