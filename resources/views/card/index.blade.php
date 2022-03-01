@extends('templates.master')
@section('title', 'Data Kartu')

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
                    <h3>Data Kartu</h3>
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
                            <a href="{{ url('/card/create')}}" class="btn btn-primary" role="button">
                            <i class="fa-regular fa-plus"></i> Tambah Kartu  
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
                    Table card
                </div>
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Kartu</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($card as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->no_kartu }}</td>
                                <td>@if($item->status == 'aktif')<span class="badge rounded-pill bg-primary">{{ $item->status }}</span>
                                    @else<span class="badge rounded-pill bg-danger">{{ $item->status }}
                                        @endif</td>


                                <td>
                                    <a href="{{url('/card/'.$item->id).'/edit'}}" class="btn btn-info"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <form method="POST" action="{{url('/card/'.$item->id)}}">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-danger mt-3"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
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