<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Business extends Model
{
    use HasFactory;
    
    public function signIn($dataInsert){
        $bs = DB::select('SELECT * FROM businesses WHERE email=? and password=?', $dataInsert);
        return $bs;
    }

    public function signUp($dataInsert){
        DB::insert('INSERT INTO businesses (email,password,namePersonal,phonePersonal,phoneBusiness,gender,nameBusiness) VALUES (?,?,?,?,?,?,?)', $dataInsert);

    }
}
