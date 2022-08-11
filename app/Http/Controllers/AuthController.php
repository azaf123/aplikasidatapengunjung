<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            'name' => 'required',
            'fullname' => 'required',
            'nopegawai' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|alpha_num',
            'retypepassword' => 'required|same:password|min:8|max:10',

        ], [
            'name.required'=>'Username diperlukan',
            'fullname.required' => 'Nama Lengkap diperlukan ',
            'nopegawai.required' => 'Nomor Petugas diperlukan ',
            'email.required' => 'Email diperlukan',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password diperlukan',
            'password.min' => 'min 8 karakter',
            'password.max' => 'max 10 karakter',
            'password.alpha_num' => 'Password harus huruf dan angka',
            'retypepassword.required' => 'Retype Password diperlukan',
            'retypepassword.same' => 'Password tidak sama',

        ]);
        Officer::create([
            'nama_petugas' => $request->fullname,
            'no_pegawai' => $request->nopegawai,
           'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin'
        ]);
        Alert::success('Berhasil', 'Pendaftaran Berhasil');
        return redirect('/login');
    }

    public function login_store(Request $request)
    {
        // return $request;
        //if password is incorrect return wrong password
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email diperlukan',
            'password.required' => 'Password diperlukan',
        ]);
        if (!Auth::attempt($request->only(['email', 'password']))) 
        {
            Alert::error('Gagal', 'Email atau Password Salah');

            return redirect('/login')->with('status', 'Email atau Password salah');
        }
        else{
        Alert::success('Berhasil', 'Login Berhasil');
        return redirect('master-data/');
        }
   
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
