<?php

use Illuminate\Database\Seeder;

class CcGenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =[
            [
                'code' => 1,
                'name' => "Male",
                'name_bn' => "পুরুষ ",
                'weight' => 2,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 2,
                'name' => "Female",
                'name_bn' => "মহিলা",
                'weight' => 1,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 3,
                'name' => "Hijra",
                'name_bn' => "হিজড়া",
                'weight' => 0,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ]
        ];

        DB::table('cc_gender')->truncate();

        foreach($data as $value){
        DB::table('cc_gender')->insert([
            'code' => $value['code'],
            'name' => $value['name'],
            'name_bn' => $value['name_bn'],
            'weight' => $value['weight'],
            'is_default' => $value['is_default'],
            'is_active' => $value['is_active'],
            'created_by' => $value['created_by'],
            'updated_by' => $value['updated_by'],
         ]);

        }
    }

//    public function run()
//    {
////        DB::table('cc_genders')->truncate();
//
//        DB::table('cc_genders')->insert([
//            'code' => 1,
//            'name' => "Male",
//            'name_bn' => "পুরুষ ",
//            'weight' => 2,
//            'is_default' => 1,
//            'is_active' => 1,
//            'created_by' => 1,
//            'updated_by' => 1
//        ]);
//
//        DB::table('cc_genders')->insert([
//            'code' => 2,
//            'name' => "Female",
//            'name_bn' => "মহিলা",
//            'weight' => 1,
//            'is_default' => 1,
//            'is_active' => 1,
//            'created_by' => 1,
//            'updated_by' => 1
//        ]);
//
//        DB::table('cc_genders')->insert([
//            'code' => 3,
//            'name' => "Hijra",
//            'name_bn' => "হিজড়া",
//            'weight' => 0,
//            'is_default' => 1,
//            'is_active' => 1,
//            'created_by' => 1,
//            'updated_by' => 1
//        ]);
//    }

}
