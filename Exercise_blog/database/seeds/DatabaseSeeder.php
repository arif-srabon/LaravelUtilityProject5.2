<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
//        $this->depeartmntTableSeed();
//        $this->designationTableSeed();
        /**
         * Run the database seeds.
         *
         * @return void
         */

    }

    public function depeartmntTableSeed(){
        $faker = Faker::create();
//        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('cc_department')->insert([
                'department_pin_no'=>$faker->randomNumber(4),
                'departmen_name'=>$faker->name,
                'departmen_short_name'=>$faker->stateAbbr(3,5),
                'division_id'=>null,
                'district_id'=>null,
                'upazilla_id'=>null,
                'address'=>$faker->address,
                'contact_person_name'=>$faker->name,
                'mobile'=>$faker->PhoneNumber,
                'office_phone'=>$faker->e164PhoneNumber,
                'center_logo'=>null,
                'status'=>1,
                'email' => $faker->unique()->email,
                'created_by' => 1,
            ]);
        }
    }

    public function designationTableSeed(){
        $faker = Faker::create();
//        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('cc_designation')->insert([
                'code'=>$faker->randomNumber(4),
                'name'=>$faker->name,
                'name_bn'=>$faker->name(3,10),
                'created_by'=>1,
                'weight'=>$faker->randomDigitNotNull,
                'is_default'=>0,
                'is_active'=>1,
            ]);
        }
    }
}
