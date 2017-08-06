<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        $this->call('ServicesTableSeeder');
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(ServicesTableSeeder::class);
        $this->command->info('Services Table seeded!');
    }
}
