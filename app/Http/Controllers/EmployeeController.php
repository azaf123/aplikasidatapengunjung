<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Fungsi;
use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
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
                'namakaryawan.required' => 'Nama karyawan harus diisi',
                'namakaryawan.min' => 'Nama karyawan minimal 3 karakter',
                'namakaryawan.max' => 'Nama karyawan maksimal 100 karakter',
                'nopegawai.required' => 'Nomor pegawai harus diisi',
                'fungsiid.required' => 'Fungsi harus diisi',
                'email.required' => 'Email harus diisi',

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
        toast('Berhasil Ditambahkan','success');  
        return redirect('/master-data/employee')->with('status');
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
                'namakaryawan.required' => 'Nama karyawan harus diisi',
                'namakaryawan.min' => 'Nama karyawan minimal 3 karakter',
                'namakaryawan.max' => 'Nama karyawan maksimal 100 karakter',
                'nopegawai.required' => 'Nomor pegawai harus diisi',
                'fungsiid.required' => 'Fungsi harus diisi',
                'email.required' => 'Email harus diisi',

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
        toast('Berhasil Diperbarui','success'); 
        return redirect('/master-data/employee')->with('status');
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
        toast('Berhasil Dihapus','success'); 
        return redirect('/master-data/employee')->with('status');
        
    }
    public function importEmployeeView(){
       return view('employee.import');
    }

    public function importEmployee(Request $request){
        Excel::import(new EmployeesImport, $request->file('excelfile'));
        toast('Berhasil Di Import','success'); 
        return redirect('/master-data/employee')->with('status');
    }
}
