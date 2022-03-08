@extends('templates.header')
@section('title', 'Laporan Data Pengunjung')

<br>
<br>
<br>
<style>
    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>
<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Laporan Data Pengunjung</h3>
                <p class="text-subtitle text-muted">PT Pertamina Patra Niaga Regional Sumbagsel</p>
               
            </div>

        </div>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="card">

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
                        @foreach ($tglpengunjung as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{asset('img/'.$item->image)}}" alt="" width="50"></td>
                            <td>{{ $item->nama_pengunjung }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->fungsi->nama_fungsi }}</td>
                            <td>{{ $item->employee->nama_karyawan }}</td>
                            <td>{{ $item->keperluan }}</td>
                            <td>{{ $item->created_at }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
        <div class="row mb-3">
                    <div class="col-lg-10">
                        <a href="{{url('/cetakformpertanggal')}}" id="printPageButton" onclick="" class="btn btn-secondary" role="button">
                            Kembali
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a href="" id="printPageButton" onclick="window.print();" class="btn btn-primary" role="button">
                        <i class="fa-solid fa-print"></i>    
                        Cetak Data Laporan
                            
                        </a>
                 
                    </div>
                </div>
                
    </div>
    
</section>

</div>


</div>