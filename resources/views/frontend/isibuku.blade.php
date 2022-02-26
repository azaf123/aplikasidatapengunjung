@extends('templatefrontend.header')
@section('title', 'Isi Buku Tamu')
<style>
    #my_camera {
        width: 210px;
        height: 210px;
        border: 1px solid black;
        object-fit: fill;
    }

    #results {
        width: 210px;
        height: 210px;
        border: 1px solid black;
    }
</style>
<section id="base2">
    <div class="container">
        <div class="wadahluar">
            <div class="row">
                <div class="col">
                    <div class="title">
                        <h1><b>Buku Tamu Digital</b></h1>
                    </div>
                </div>
            </div>
            <form class="form form-horizontal" action="{{ url('/isibukuform')}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-6 wadahkiri">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nama Visitor</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('namavisitor') is-invalid @enderror" placeholder="Masukkan Nama Visitor" id="first-name-icon" name="namavisitor">
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
                                <br><br>
                                <div class="col-md-4">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat Visitor" id="first-name-icon" name="alamat">
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
                                <br><br>
                                <div class="col-md-4">
                                    <label>Fungsi Yang Dikunjungi</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-control @error('fungsiid') is-invalid @enderror" id="fungsiid" name="fungsiid" onchange="">
                                                <!-- using FOREIGN ID -->
                                                @foreach ($fungsi as $item)
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
                                <br><br>
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
                                <br><br>
                                <div class="col-md-4">
                                    <label>Keperluan</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a comment here" name="keperluan"></textarea>
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
                                <br><br><br>
                                <div class="col-md-4">
                                    <label>Nomor Kartu</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-control @error('nokartu') is-invalid @enderror" id="nokartu" name="nokartu">
                                                <!-- using FOREIGN ID -->
                                                @foreach ($card as $item)
                                                <option value="{{$item->id}}">{{$item->no_kartu}}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                            @error('nokartu')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <!-- hidden status datang -->
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="hidden" name="status" value="datang">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-1 mt-3">
                        <div class="d-flex garis" style="height: 400px">
                            <div class="vr"></div>
                        </div>
                    </div>
                    <!-- Webcam -->
                    <div class="col mt-5">
                        <div id="my_camera"><button style="margin-left: 42px; border:none;" type=button class="btn btn-secondary mt-4" value="" onClick="configure()"><img src="{{asset('/assets/images/landingpage/camera.png')}}" alt=""><br><b>
                                    <h6>Buka Kamera</h6>
                                </b></button></div>
                        <br>

                        <div class="row">
                            <div class="col mt-2" style="margin-left: 20px;">
                                <input type=button class="btn btn-success" value="Ambil Foto" onClick="take_snapshot()">
                                <input type=hidden name="image" class="image-tag">
                            </div>
                        </div>


                    </div>
                    <div class="col">
                        <br>
                        <br>
                        <div id="results" class="@error('image') is-invalid @enderror"></div>
                        @error('image')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="col" style="margin-left: 46px; margin-top: 30px;">
                            <input type=button class="btn btn-warning" value="Ambil Ulang" onClick="configure()">
                        </div>
                    </div>


                </div>

            </form>
        </div>
    </div>
</section>
<!-- Script -->
<script type="text/javascript" src="{{asset('webcam/webcam.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
    // Configure a few settings and attach camera
    function configure() {
        Webcam.set({
            width: 300,
            height: 220,
            image_format: 'jpeg',
            jpeg_quality: 100,
            crop_width: 210,
            crop_height: 210,

        });
        Webcam.attach('#my_camera');
    }

    // A button for taking snaps
    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap(function(data_uri) {
            // display results in page
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML =
                '<img id="image" src="' + data_uri + '" name="image"/>';

        });
        Webcam.reset();

    }
</script>
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