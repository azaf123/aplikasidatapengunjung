@extends('templates.master')
@section('title', 'Laporan Data Pengunjung')

@section('main')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Laporan Data Pengunjung</h3>
                    <p class="text-subtitle text-muted">PT Pertamina Patra Niaga Regional Sumbagsel</p>
                    <div class="row">
                        <div class="col">                            
                            @if (session('status'))                           
                            <div class="alert alert-success d-flex align-items-center" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <center>{{ session('status') }}</center>
                            </div>
                            
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <a href="{{ url('/cetak')}}" class="btn btn-primary" role="button">
                                Cetak Data Laporan
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="col">
                    Visitors Table
                    </div>
                   
                   
                </div>
                
                <div class="card-body">

                    <table class="table table-striped" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Nama Pengunjung</th>
                                <th>Alamat</th>
                                <th>Fungsi Yang Dikunjungi</th>
                                <th>Nama Karyawan</th>
                                <th>Keperluan</th>
                                <th>Tanggal dan Waktu Kunjungan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitor as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{asset('img/'.$item->image)}}" alt="" width="50"></td>
                                <td>{{ $item->nama_pengunjung }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->fungsi->nama_fungsi }}</td>
                                <td>{{ $item->employee->nama_karyawan}}</td>
                                <td>{{ $item->keperluan }}</td>
                                <td>{{ $item->created_at }}</td>     
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>
@endsesction