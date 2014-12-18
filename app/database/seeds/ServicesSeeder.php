<?php

class ServicesSeeder extends Seeder {

	public function run() {

		# Clear the tables to a blank slate
		DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
		DB::statement('TRUNCATE services');
		DB::statement('TRUNCATE hevents');
		DB::statement('TRUNCATE users');

		# Services
		$training = new Service;
		$training->servname = 'Horse Training';
		$training->servdesc = 'Trainer rides horse (at least green-broke) to teach basic commands using reigns, legs, and voice.';
		$training->cost_unit = 25;
		$training->unit = 'hour';
		$training->save();

		$riding = new Service;
		$riding->servname = 'Horse Riding Lesson';
		$riding->servdesc = 'Novice to advanced horse riding lessons (Western or English).';
		$riding->cost_unit = 20;
		$riding->unit = 'hour';
		$riding->save();

		$buggy = new Service;
		$buggy->servname = 'Buggy Ride';
		$buggy->servdesc = 'Buggy pulled by minature horse; can hold three passangers plus the driver.';
		$buggy->cost_unit = 30;
		$buggy->unit = 'hour';
		$buggy->save();

		$trail = new Service;
		$trail->servname = 'Guided Trail Ride';
		$trail->servdesc = 'Wide range of horses (all well broke) to choose from.  Groups of up to twelve welcome.  All groups will be guided with trail selection dependent on desired length of ride.';
		$trail->cost_unit = 25;
		$trail->unit = 'hour';
		$trail->save();

		$trail = new Service;
		$trail->servname = 'Horse Boarding';
		$trail->servdesc = 'Horses are kept in large, separated fields (stalls available).  Feeding once/twice a day depending on the horse.  Cost assumes owner providing any feeds other than hay.';
		$trail->cost_unit = 350;
		$trail->unit = 'month';
		$trail->save();
	}

}