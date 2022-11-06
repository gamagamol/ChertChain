<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CertificationModel extends Model
{
    use HasFactory;


    public function Index()
    {
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


    public function GetCertificateById($id)
    {
        return DB::select("select c.*,(select name from users s where c.holder=s.id_auth) as holder_name
                        ,(select name from users s where c.sign=s.id_auth) as sign_name 
                        from certificate c where c.id_certificate=$id");
    }



    public function Sign($sign)
    {


        return DB::select("select c.id_certificate,c.hash_certificate,
                        (select name from users s where c.holder=s.id_auth) as holder_name,
                        (select name from users s where c.sign=s.id_auth) as sign_name ,
                        c.title_certificate,c.data_certificate,c.data_certificate1,ipfs_link,date_sign_holder,date_sign_sign from users s join certificate c on s.id_auth = c.sign 
                        where c.sign=$sign");
    }
    public function Holder($holder)
    {

        return DB::select("select c.id_certificate,c.hash_certificate,
                        (select name from users s where c.holder=s.id_auth) as holder_name,
                        (select name from users s where c.sign=s.id_auth) as sign_name ,
                        c.title_certificate,c.data_certificate,c.data_certificate1,ipfs_link,date_sign_holder,date_sign_sign from users s join certificate c on s.id_auth = c.sign 
                        where c.holder=$holder");
    }


    public function UpdateSign($id_certificate, $type)
    {
        if ($type == 'sign') {
            DB::table('certificate')->where('id_certificate', $id_certificate)->update(['date_sign_sign' => date('Y-m-d')]);
        } else {
            DB::table('certificate')->where('id_certificate', $id_certificate)->update(['date_sign_holder' => date('Y-m-d')]);
        }
    }


    public function UpdateAll($id_auth,$type)
    {
        
        DB::table('certificate')->where("$type", $id_auth)->update(["date_sign_$type" => date('Y-m-d')]);
    }
}
