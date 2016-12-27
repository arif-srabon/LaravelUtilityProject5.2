<?php

use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'code' => 'CSE',
                'name' => "Computer Science and Engineering",
                'name_bn' => "Computer Science and Engineering [BN]",
                'weight' => 8,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 'ACC',
                'name' => "Accounting",
                'name_bn' => "Accounting [BN]",
                'weight' => 7,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 'FIN',
                'name' => "Finance",
                'name_bn' => "Finance [BN]",
                'weight' => 6,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'code' => 'IST',
                'name' => "Islamic Studies",
                'name_bn' => "Islamic Studies [BN]",
                'weight' => 5,
                'is_default' => 1,
                'is_active' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ]

        ];
//        DB::table('cc_educational_qualification')->truncate();
        foreach ($data as $value) {
            DB::table('cc_department')->insert([
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
}
