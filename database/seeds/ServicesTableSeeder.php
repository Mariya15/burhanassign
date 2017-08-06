<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('services')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        //insert some dummy records

        DB::table('services')->insert(array(
            array('service_name'=>'Detailing', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('service_name'=>'Estimating', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('service_name'=>'Design', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('service_name'=>'Construction', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('service_name'=>'Review', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()),
            array('service_name'=>'Inspection', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now())
        ));
    }
}
