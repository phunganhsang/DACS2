<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use App\Models\Business;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    //
    private $ap;
    public function __construct()
    {
        $this->ap = new Applicants();
        $this->bs = new Business();
    }

    public function signInAp(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email.required' => 'Vui lòng nhập email',
        ]);


        $dataInsert = [
            $request->email,
            $request->password,
        ];



        if (!empty($this->ap->signIn($dataInsert))) {
            $nameSessionAcccount = $this->ap->signIn($dataInsert)[0]->name;

            session()->put('nameSession', $nameSessionAcccount);
            return redirect()->route('ap.index')->with('msg', $request->email);
        } else {
            return redirect()->route('ap.signin')->with('msg', 'Sai mật khẩu');
        }

        // dd($this->ap->signIn($dataInsert));
    }

    public function signInBs(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu',
            'email.required' => 'Vui lòng nhập email',
        ]);


        $dataInsert = [
            $request->email,
            $request->password,
        ];



        if (!empty($this->bs->signIn($dataInsert))) {
            $nameSessionAcccountBs = $this->bs->signIn($dataInsert)[0]->namePersonal;

            session()->put('nameSessionBs', $nameSessionAcccountBs);
            return redirect()->route('bs.index')->with('msg', $request->email);
        } else {
            return redirect()->route('bs.signin')->with('msg', 'Sai mật khẩu');

            dd($request->all());
        }
    }
}
