<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Fungsi;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::all();
        return view('employee.index',compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fungsi = Fungsi::all();
        return view('employee.create',compact('fungsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $request->validate(
            [
                'namakaryawan' => 'required|min:3|max:100',
                'nopegawai'=>'required',
                'fungsiid'=>'required',
                'email'=>'required'

            ],
            [
                'namakaryawan.required' => 'Nama Karyawan Diperlukan',
                'namakaryawan.min' => 'min 3 kata',
                'namakaryawan.max' => 'max 100 kata',
                'nopegawai.required' => 'Nomor Pegawai Diperlukan',
                'fungsiid.required' => 'Nama Fungsi Diperlukan',
                'email.required' => 'Email Diperlukan',

            ]
        );
// return $request;
        Employee::create(
            [
                'nama_karyawan' => $request->namakaryawan,
                'no_karyawan' => $request->nopegawai,
                'fungsi_id' => $request->fungsiid,
                'email' => $request->email
            ]
        );
        return redirect('/employee')->with('status', 'Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $fungsi = Fungsi::all();
        return view('employee.update',compact('employee','fungsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(
            [
                'namakaryawan' => 'required|min:3|max:100',
                'nopegawai'=>'required',
                'fungsiid'=>'required',
                'email'=>'required'

            ],
            [
                'namakaryawan.required' => 'Nama Karyawan Diperlukan',
                'namakaryawan.min' => 'min 3 kata',
                'namakaryawan.max' => 'max 100 kata',
                'nopegawai.required' => 'Nomor Pegawai Diperlukan',
                'fungsiid.required' => 'Nama Fungsi Diperlukan',
                'email.required' => 'Email Diperlukan',

            ]
        );
// return $request;
        Employee::where('id', $employee->id)->update(
            [
                'nama_karyawan' => $request->namakaryawan,
                'no_karyawan' => $request->nopegawai,
                'fungsi_id' => $request->fungsiid,
                'email' => $request->email
            ]
        );
        return redirect('/employee')->with('status', 'Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        Employee::destroy('id', $employee->id);
        return redirect('/employee')->with('status','Berhasil Dihapus');
    }
}
