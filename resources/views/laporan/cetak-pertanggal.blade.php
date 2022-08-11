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
                    Laporan Data Pengunjung per Tanggal Berkunjung
                </div>
                <div class="card-body">
              
                    <table class="table table-striped" id="table1">
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="form-label" for="">Tanggal Awal</label>
                                <div class="position-relative">
                                    <input class="form-control" type="date" name="tglawal" id="tglawal">
                                    <b>
                                        <p style="font-size: 15px;">*jangan lupa masukkan tanggal</p>
                                    </b>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label" for="">Tanggal Akhir</label>
                                <div class="position-relative">
                                    <input class="form-control" type="date" name="tglakhir" id="tglakhir">
                                    <b>
                                        <p style="font-size: 15px;">*jangan lupa masukkan tanggal</p>
                                    </b>
                                    <br>
                                    <br>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="form-label" for="">Fungsi</label>   
                            <div class="position-relative">
                                <select class="form-select fungsi" name="fungsi" id="fungsi" style="width:170px; margin-top:-50px;">
                                    @foreach($fungsi as $item)
                                    <option value="{{$item->id}}">{{$item->nama_fungsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <a href="" class="btn btn-primary" onclick="this.href='/aplikasidatapengunjung/public/cetakpertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value+ '/' + document.getElementById('fungsi').value">Submit</a>

                    </table>
                </div>
            </div>

        </section>
    </div>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$('.fungsi').prepend('<option value="">Semua Fungsi</option>');
</script>
@endsesction