<?php

namespace App\Model\Import;

use Illuminate\Database\Eloquent\Model;
use DB;

class ImportFileModel extends Model
{
    public function CheckDuplicateValueForGeneric($code,$name){

       $sql = "SELECT id
                FROM cc_generic
                WHERE CODE = '$code' LIMIT 1";
        $info = DB::select(DB::raw($sql));
        return $info;

    }
    public function CheckDuplicateValueForDosage($code,$name){
        $sql = "SELECT id
                FROM cc_medicine_type
                WHERE CODE = '$code' LIMIT 1";
        $info = DB::select(DB::raw($sql));
        return $info;
    }

    public function CheckCompany($Ccode,$Cname){
        $info = DB::table('manufacturer')
                    ->select('id')
                    ->where('company_code',$Ccode)
                    ->where('name',$Cname)
                    ->limit(1)
                    ->get();
        return $info;
    }

    public function CheckDuplicateValueForMedicineData($item){
        $info = DB::table('medicine')
            ->select('id')
            ->where('name',$item['PROD_NAME'])
//            ->where('code',$item['DCC_NO'])
//            ->where('medicine_type_id',$item['DOS_CODE'])
//            ->where('generic_id',$item['generic_id'])
            ->limit(1)
            ->get();
        return $info;
    }
}
