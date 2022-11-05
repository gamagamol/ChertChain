<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AuthModel extends Model
{
    use HasFactory;


    public function Register($data){
        DB::table('users')->insert($data);
    }

    public function GetStatus($ussername){
        return DB::table('users')->select('status')->where('ussername',$ussername)->first();
    }

    public function GetUser($ussername){
        return DB::table('users')->where('ussername',$ussername)->get();
    }


    public function GetUserAll(){
        return DB::select("SELECT * FROM users where status !='admin'");
    }

    public function GetUserById($id)
    {
        return DB::table('users')->where('id_auth', $id)->first();
    }


    public function UpdateUser($data,$id){
        DB::table('users')->where('id_auth',$id)->update($data);
    }



}
