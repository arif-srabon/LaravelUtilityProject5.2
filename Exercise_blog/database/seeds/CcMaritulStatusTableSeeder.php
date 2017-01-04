<?php

use Illuminate\Database\Seeder;

class CcMaritulStatusTableSeeder extends Seeder
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
                'name' => "Married",
                'name_bn' => "বিবাহিত ",
                'weight' => 3,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 1,
                'name' => "Unmarried",
                'name_bn' => "অবিবাহিত ",
                'weight' => 3,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 1,
                'name' => "Widow",
                'name_bn' => "বিধবা ",
                'weight' => 3,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 1,
                'name' => "Love Marriage",
                'name_bn' => "প্রেমের বিয়ে ",
                'weight' => 3,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
        ];

        DB::table('cc_maritus_status')->truncate();

        foreach($data as $value){
            DB::table('cc_maritus_status')->insert([
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
////        DB::table('cc_marital_status')->truncate();
//
//        DB::table('cc_marital_status')->insert([
//            'code' => 1,
//            'name' => "Married",
//            'name_bn' => "Married ",
//            'weight' => 3,
//            'is_default' => 1,
//            'is_active' => 1,
//            'created_by' => 1,
//            'updated_by' => 1
//        ]);
//
//        DB::table('cc_marital_status')->insert([
//            'code' => 2,
//            'name' => "Unmarried",
//            'name_bn' => "Unmarried",
//            'weight' => 2,
//            'is_default' => 1,
//            'is_active' => 1,
//            'created_by' => 1,
//            'updated_by' => 1
//        ]);
//
//        DB::table('cc_marital_status')->insert([
//            'code' => 3,
//            'name' => "Widow",
//            'name_bn' => "Widow",
//            'weight' => 1,
//            'is_default' => 1,
//            'is_active' => 1,
//            'created_by' => 1,
//            'updated_by' => 1
//        ]);
//    }
}
