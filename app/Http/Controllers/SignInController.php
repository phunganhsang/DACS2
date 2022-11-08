<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    //
    private $ap;
    public function __construct(){
        $this->ap = new Applicants();
    }
    
    public function signInAp(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email.required' => 'Vui lòng nhập email',
        ]);
        

        $dataInsert = [
            $request->email,
            $request->password,
        ];

        if(!empty($this->ap->signIn($dataInsert))){
            return redirect()->route('ap.index')->with('msg',$request->email);
        }
        else{
            return redirect()->route('ap.signin')->with('msg','sai mat khau');
        }
        
        // dd($this->ap->signIn($dataInsert));
    }

    public function signInBs(Request $request){
        dd($request->all());
    }
}
