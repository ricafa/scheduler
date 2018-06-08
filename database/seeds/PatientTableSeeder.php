<?php
use Illuminate\Database\Seeder;
use App\Patient;
use Faker\Factory as Faker;

class PatientTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		Schema::disableForeignKeyConstraints();
		DB::table('patients')->truncate();

		$faker = Faker::create();

		foreach(range(1,20) as $i){
			Patient::create([
				'name'=>$faker->name(),
				'cpf' =>$faker->ipv4()
			]);
		}

		$this->command->info('Patients Created Successfully!');
		Schema::enableForeignKeyConstraints();
	}
}