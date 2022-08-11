@extends('templates.master')
@section('title', 'Detail Visitor')

@section('main')
<div id="main">
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><h2>Detail Pengunjung</h2></h4>
                    <br>
                    <br>

                    <div class="d-flex">
                        <div class="row">
                            <div class="col">
                                <label for="">Nama</label>
                                <h5>{{ $visitor->nama_pengunjung }}</h5>
                                <br>
                                <label for="">Alamat Pengunjung</label>
                                <h5>{{ $visitor->alamat }}</h5>
                                <br>
                                <label for="">Nomor Kontak HP</label>
                                <h5>{{ $visitor->contact }}</h5>
                                <br>
                                <label for="">Fungsi Yang Dikunjungi</label>
                                <h5>{{ $visitor->fungsi->nama_fungsi }}</h5>
                                <br>
                                <label for="">Nama Karyawan Yang dikunjungi</label>
                                <h5>{{ $visitor->employee->nama_karyawan }}</h5>
                                <br>
                                <label for="">Keperluan</label>
                                <h5>{{ $visitor->keperluan }}</h5>
                                <br>
                                <label for="">Waktu Kedatangan</label>
                                <h5>{{ $visitor->created_at }}</h5>
                                <br>
                                <label for="">Waktu Kepulangan</label>
                                <h5>@if($visitor->status == 'datang'){{ $visitor->updated_at == null }}@else{{ $visitor->updated_at }}@endif</h5>
                                <br>
                                <label for="">Nomor Kartu</label>
                                <h5>{{ $visitor->card->no_kartu }}</h5>
                                <br>
                                <label for="">Status</label>
                                <h5><span class="badge rounded-pill bg-primary">{{ $visitor->status }}</span></h5>
                            </div>
                            <div class="col-lg-4">
                            <label for="">Foto Pengunjung</label>
                                <img src="{{ asset('img/' . $visitor->image) }}" alt="image" width="450px" height="450px" style="object-fit:cover; border-radius:20px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection