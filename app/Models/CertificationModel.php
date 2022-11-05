<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CertificationModel extends Model
{
    use HasFactory;


    public function Index(){
        return DB::select("select c.*,(select name from users s where c.holder=s.id_auth) as holder_name
                        ,(select name from users s where c.sign=s.id_auth) as sign_name 
                        from certificate c ");
    }


    public function Insert($data)
    {
        DB::table('certificate')->insert($data);
    }


    public function CheckHash($hash)
    {
        $check = DB::table('certificate')->select('hash_certificate')->where('hash_certificate', $hash)->first();

        if ($check) {

            if ($check->hash_certificate) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }


    public function GetCertificateById($id){
        return DB::select("select c.*,(select name from users s where c.holder=s.id_auth) as holder_name
                        ,(select name from users s where c.sign=s.id_auth) as sign_name 
                        from certificate c where c.id_certificate=$id");
    }
}
