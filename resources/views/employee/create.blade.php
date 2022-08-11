@extends('templates.master')
@section('title', 'Tambah Karyawan')

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
                    <h3>Form Tambah</h3>
                    <p class="text-subtitle text-muted">PT Pertamina Patra Niaga Regional Sumbagsel</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <h3><b>Tambah Karyawan Baru</b></h3>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Karyawan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ url('/master-data/employee')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Nama Karyawan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                   
                                                        <input type="text" class="form-control @error('namakaryawan') is-invalid @enderror" placeholder="Masukkan Nama Karyawan" id="first-name-icon" name="namakaryawan">
                                                      
                                                        @error('namakaryawan')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nomor Pegawai</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                   
                                                        <input type="text" class="form-control @error('nopegawai') is-invalid @enderror" placeholder="Masukkan Nomor Pegawai" id="first-name-icon" name="nopegawai">
                                                      
                                                        @error('nopegawai')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                 
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Fungsi</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                   
                                                        <select class="form-control @error('fungsiid') is-invalid @enderror" id="fungsiid" name="fungsiid">
                                                            <!-- using FOREIGN ID -->
                                                            @foreach ($fungsi as $item)
                                                            <option value="{{$item->id}}">{{$item->nama_fungsi}}</option>
                                                            @endforeach
                                                        </select>
                                                      
                                                        @error('fungsiid')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                   
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email karyawan" id="first-name-icon" name="email">
                                                      
                                                        @error('email')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->
    </div>

    
</div>
@endsection