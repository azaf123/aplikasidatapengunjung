@extends('templatefrontend.header')
@section('title', 'Pengunjung Keluar')
<section id="base3" style="background-image: url('{{url('/bg5.jpeg')}}');">
    <div class="container">
        <div class="wadahluar">
            <div class="row">
                <div class="col">
                    <div class="title">
                        <h1><b>Silahkan Ambil Tanda Pengenal</b></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-auto wadahkiri" style="padding-right:80px; padding-left:80px; background-image: url('{{url('/assets/images/landingpage/carousel2.jpeg')}}');">
                    <form action="{{ url('/keluarpengunjung')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h3>Masukkan ID Visitor</h3>
                        <select class="form-control" id="nokartu" name="nokartu" style="padding-left: 155px;">
                            <!-- using FOREIGN ID -->
                            @foreach ($card as $item)
                            <option value="{{$item->id}}">{{$item->no_kartu}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">Konfirmasi</button>
                    </form>
                </div>
                <div class="col carousel">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{asset('/assets/images/landingpage/carousel1.jpg')}}" class="d-block w-100" />
                                <div class="layer">
                                    <h2>
                                        <b><br />Terima Kasih</b>
                                    </h2>
                                    <h1>Telah Berkunjung di <b>PT Pertamina Patra Niaga</b></h1>
                                    <h1><b>Regional Sumbagsel</b></h1>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/assets/images/landingpage/carousel2.jpeg')}}" class="d-block w-100" />
                                <div class="layer">
                                    <h2>
                                        <b><br />Visi</b>
                                    </h2>
                                    <h1>Menjadi perusahaan <b>energi</b></h1>
                                    <h1>nasional tingkat <b>dunia</b></h1>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('/assets/images/landingpage/carousel3.jpeg')}}" class="d-block w-100" />
                                <div class="layer">
                                    <h2><b>Misi</b></h2>
                                    <h1>Menjalankan usaha <b>minyak</b>, <b>gas</b>, serta</h1>
                                    <h1><b>energi baru</b> dan <b>terbarukan</b> secara</h1>
                                    <h1><b>terintegrasi</b>, berdasarkan prinsi-prinsip</h1>
                                    <h1>komersial yang <b>kuat</b></h1>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <i class="fas fa-arrow-circle-left btnleft"></i>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <i class="fas fa-arrow-circle-right btnright"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>