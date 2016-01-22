<?php

use Illuminate\Database\Seeder;
use CodeCommerce\Test;

class TestTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run() {
		Test::truncate();
		factory(Test::class, 10)->create();
	}
}
