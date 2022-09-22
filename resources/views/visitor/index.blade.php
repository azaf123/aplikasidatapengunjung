@extends('templates.master')
@section('title', 'Data Visitor')


@section('main')
<style>
    header a{
       
        width: 230px;
      

    }

</style>
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
                    <h3>Data Pengunjung</h3>
                    <p class="text-subtitle text-muted">PT Pertamina Patra Niaga Regional Sumbagsel</p>
                    <div class="row">
                        <div class="col">
                            @if (session('status'))
                           <div class="alert alert-success">
                                {{ session('status') }}   
                           </div>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-5">
                            <a href="{{ url('/master-data/visitor/create')}}" class="btn btn-primary" role="button">
                            <span style="margin-right: 10px;"><span class="fa-fw select-all fas"></span></span> Tambah Pengunjung
                            </a>
                        </div>
                        <div class="col-lg-5">
                            <a href="{{ url('/pengunjungkeluar')}}" class="btn btn-primary" role="button">
                            <span style="margin-right: 10px;">
                            <span class="fa-fw select-all fas"></span></span> Keluar Pengunjung
                            </a>
                        </div>
                        
                    </div>
                    
                   
                    <div class="row mb-3">
                    <div class="col-lg-5">
                            <a href="{{ url('master-data/exportvisitor')}}" class="btn btn-secondary" role="button">
                            <span style="margin-right: 10px;"> <span class="fa-fw select-all fas"></span></span> Export Data 
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
                    Tabel Pengunjung
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                            
                                <th>Nama Pengunjung</th>
                          
                                <th>Fungsi Yang Dikunjungi</th>
                                <th>Nama Karyawan</th>
                                <th>Keperluan</th>
                                <th>Nomor Kontak</th>
                                <th>Nomor Kartu </th>
                                <th>Status </th>
                                <th>Waktu Datang </th>
                                <th>Waktu Pulang </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitor as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->nama_pengunjung }}</td>
                         
                                <td>{{ $item->fungsi->nama_fungsi }}</td>
                                <td>{{ $item->employee->nama_karyawan }}</td>
                                <td>{{ (strlen($item->keperluan)>10) ? substr($item -> keperluan, 0,8) . '...':$item->keperluan }}</td>
                                <td>{{ $item->contact}}</td>
                                <td>{{ $item->card->no_kartu }}</td>
                                <td>@if($item->status == 'datang')<span class="badge rounded-pill bg-primary">{{ $item->status }}</span>
                                    @else<span class="badge rounded-pill bg-danger">{{ $item->status }}
                                        @endif
                                </td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{$item->status =='datang'?"sedang dikantor":$item->updated_at}}</td>
                                <td>
                                    <a href="{{url('/master-data/visitor/'.$item->id).'/edit'}}" class="btn btn-info"><span class="fa-fw select-all fas"></span></a>
                                    <form method="POST" action="{{url('/master-data/visitor/'.$item->id)}}">
                                        @csrf
                                        @method("delete") 

                                        <button onclick="return confirm('Apakah anda yakin')" type="submit" class="btn btn-danger mt-3"><span class="fa-fw select-all fas"></span></button>
                                    </form>
                                    <a href="{{url('/master-data/visitor/' . $item->id)}}">
                                        <button type="submit" class="btn btn-danger"><span class="fa-fw select-all fas"></span></button>
                                    </a>
                                </td>
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