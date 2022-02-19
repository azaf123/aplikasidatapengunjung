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
                            <label for="">Tanggal Awal</label>
                            <div class="position-relative">
                                <input type="date" name="tglawal" id="tglawal">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="">Tanggal Akhir</label>
                            <div class="position-relative">
                                <input type="date" name="tglakhir" id="tglakhir">
                            <br>
                            <br>
                         <!-- if -->
                            <a href="" class="btn btn-primary" onclick="this.href='/aplikasidatapengunjung/public/cetakpertanggal/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value">Submit</a>
                            </div>
                    </table>
                </div>
            </div>

        </section>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>
@endsesction