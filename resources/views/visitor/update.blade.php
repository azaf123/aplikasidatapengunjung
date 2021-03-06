@extends('templates.master')
@section('title', 'Edit Pengunjung')

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
                    <h3>Form Edit</h3>
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
                <h3><b>Edit Pengunjung Baru</b></h3>
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Pengunjung</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ url('/visitor/'.$visitor->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-body">
                                        <div class="row">
                                       
                                            <div class="col-md-4">
                                                <label>Nama Visitor</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control @error('namavisitor') is-invalid @enderror" placeholder="Masukkan Nama Visitor" id="first-name-icon" name="namavisitor" value="{{$visitor->nama_pengunjung}}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        @error('namavisitor')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat Visitor" id="first-name-icon" name="alamat" value="{{$visitor->alamat}}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nomor Kontak HP</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input type="text" class="form-control @error('nokontak') is-invalid @enderror" placeholder="Masukkan No HP Visitor" id="first-name-icon" name="nokontak" value="{{$visitor->contact}}">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        @error('nokontak')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Fungsi Yang Dikunjungi</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select class="form-control @error('fungsiid') is-invalid @enderror" id="fungsiid" name="fungsiid" onchange="">
                                                            <!-- using FOREIGN ID -->
                                                            @foreach ($fungsi as $item)
                                                            <option value="" disabled selected hidden >Pilih Fungsi</option>
                                                            <option value="{{$item->id}}">{{$item->nama_fungsi}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        @error('fungsiid')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Nama Karyawan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <select class="form-control @error('karyawanid') is-invalid @enderror" id="karyawanid" name="karyawanid">
                                                            <!-- using FOREIGN ID -->

                                                        </select>
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                        @error('karyawanid')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Keperluan</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <div class="form-floating">
                                                            <input class="form-control" placeholder="Leave a comment here" name="keperluan" value="{{$visitor->keperluan}}" ></input>
                                                            <label for="floatingTextarea">Masukkan Keperluan</label>
                                                        </div>
                                                        @error('keperluan')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                          
                                            
                                            <div class="col-md-4">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                      <select name="status" id="">
                                                          <option value="datang">datang</option>
                                                          <option value="pulang">pulang</option>
                                                      </select>

                                                        @error('status')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                        @enderror
                                                    </div>
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
<script>
    $('#fungsiid').on('change', function() {
        var id = $(this).val(); // mendapatkan nilai value
        var url = '{{url('/karyawan/')}}' + '/' + id;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                $('#karyawanid').empty();
                $("#karyawanid").append('<option>Pilih Karyawan</option>');
                if (res) {
                    $.each(res, function(key, value) {
                        $('#karyawanid').append($("<option/>", {
                            value: value['id'],
                            text: value['nama_karyawan']
                        }));
                    });
                }
            }
        });
    });
</script>
@endsection