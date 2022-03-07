<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function register_store(Request $request)
    {
        // return $request;
        $request->validate([
            'fullname' => 'required',
            'nopegawai' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|alpha_num',
            'retypepassword' => 'required|same:password|min:8|max:10',
           
        ], [
            'fullname.required' => 'Nama pengunjung diperlukan ',
            'nopegawai.required' => 'Nomor Pegawai diperlukan ',
            'email.required' => 'Email harus diisi ya',
            'email.unique' => 'Email nya udah ada ni',
            'password.required' => 'password must be required',
            'password.min' => 'min 8 character',
            'password.max' => 'max 10 character',
            'password.alpha_num' => 'Password must be there is a number',
            'retypepassword.required' => 'retype password must be required',
            'retypepassword.same' => 'password must be same with first password',
            
        ]);
        Officer::create([
            'nama_petugas' => $request->fullname,
            'no_pegawai'=>$request->nopegawai,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin'
        ]);
        return redirect('/login');
    }

    public function login_store(Request $request)
    {
// return $request;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:8|max:10',
        ], [
            'email.required' => 'email must be required',
            'password.required' => 'password must be required',
            'password.min' => 'min 8 character',
            'password.max' => 'max 10 character',
            'password.alpha_num' => 'Password must be there is a number',
        ]);
        // syntax login
        $user = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($user)) {
            return redirect('/');
        } else {
            return redirect('/login')->with('error', 'Username atau Password salah!');
        }

        
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
