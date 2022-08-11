@extends('templatefrontend.header')
@section('title', 'Isi Buku Tamu')

<style>
    #my_camera {
        width: 210px;
        height: 210px;
        border: 1px solid white;
        object-fit: fill;
    }

    #results {
        width: 210px;
        height: 210px;
        border: 1px solid white;
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
            <div class="ktp">
                <h1>*Harap titipkan tanda pengenal kepada petugas</h1>
            </div>
            <form action="{{url('/isibukuform')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 wadahkiri">

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Nama Pengunjung</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                        <input id="namavisitor" type="text" name="namavisitor" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-md-4">
                                    <label>Alamat Pengunjung</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                          <!-- <select class="form-control" name="alamat" id="alamat"></select> -->
                                          <input id="alamat" type="text" name="alamat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-md-4">
                                    <label>No Kontak HP</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="text" class="form-control @error('nokontak') is-invalid @enderror" placeholder="Masukkan No Kontak HP" id="nokontak" name="nokontak">

                                            @error('nokontak')
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
                                            <select class="choices form-select form-control @error('fungsiid') is-invalid @enderror" id="fungsiid" name="fungsiid" onchange="">
                                                <!-- using FOREIGN ID -->
                                                <optgroup label="Pilih Fungsi">
                                                    @foreach ($fungsi as $item)
                                                    <!-- <option value="" disabled selected hidden>Pilih Fungsi</option> -->
                                                    <option value="{{$item->id}}">{{$item->nama_fungsi}}</option>
                                                    @endforeach
                                                </optgroup>
                                            </select>

                                            @error('fungsiid')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="col-md-4">
                                    <label>Nama Karyawan</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <select class="form-control @error('karyawanid') is-invalid @enderror" id="karyawanid" name="karyawanid">
                                            </select>
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
                                                <textarea class="form-control" name="keperluan" id="keperluan"></textarea>
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

                                            @error('nokartu')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <br><br>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="submit">
                                        Kirim
                                    </button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-1 mt-3">
                        <div class="d-flex garis" style="height: 400px">

                            <div class="vr">

                            </div>
                        </div>
                    </div>
                    <!-- Webcam -->
                    <div class="col-lg-2 mt-5">
                        <!-- webcam -->
                        <div id="my_camera"></div>
                        <div class="row">
                            <div class="col mt-2" style="margin-left: 20px;">
                                <input type=button class="btn btn-success" value="Ambil Foto" onClick="take_snapshot()">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 mt-5">
                        <div id="results"></div>
                        <input type=hidden name="image" class="image-tag">
                        <div class="col mt-2">
                            <div class="col" style="margin-left: 40px;">
                                <input type=button class="btn btn-warning" value="Ambil Ulang" onClick="remove_snapshot()">
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Modal -->

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Verifikasi Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body" id="modal_body">
                                <div class="form-group">
                                    <div>
                                        <label for="disabledInput"><b>Nama Pengunjung</b></label>
                                        <input type="text" class="form-control" id="modal-nama" placeholder="Harap di isi terlebih dahulu" disabled value="{{$item->nama_pengunjung}}">
                                    </div>
                                    <div>
                                        <label for="disabledInput"><b>Alamat Pengunjung</b></label>
                                        <input type="text" class="form-control" id="modal-alamat" placeholder="Harap di isi terlebih dahulu" disabled>
                                    </div>
                                    <div>
                                        <label for="disabledInput"><b>No kontak</b></label>
                                        <input type="text" class="form-control" id="modal-kontak" placeholder="Harap di isi terlebih dahulu" disabled>
                                    </div>
                                    <div>
                                        <label for="disabledInput"><b>Fungsi</b></label>
                                        <input type="text" class="form-control" id="modal-fungsi" placeholder="Harap di isi terlebih dahulu" disabled>
                                    </div>
                                    <div>
                                        <label for="disabledInput"><b>Nama Karyawan</b></label>
                                        <input type="text" class="form-control" id="modal-karyawan" placeholder="Harap di isi terlebih dahulu" disabled>
                                    </div>
                                    <div>
                                        <label for="disabledInput"><b>Keperluan</b></label>
                                        <input type="text" class="form-control" id="modal-keperluan" placeholder="Harap di isi terlebih dahulu" disabled>
                                    </div>
                                    <div>
                                        <label for="disabledInput"><b>Nomor Kartu</b></label>
                                        <input type="text" class="form-control" id="modal-nokartu" placeholder="Harap di isi terlebih dahulu" disabled>
                                    </div>
                                    <!-- hidden status datang -->
                                    <input type="hidden" name="status" value="datang">

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
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
<!-- Script -->
<script type="text/javascript" src="{{asset('webcam/webcam.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
    // Configure a few settings and attach camera
    Webcam.set({
        width: 300,
        height: 220,
        image_format: 'jpeg',
        jpeg_quality: 100,
        crop_width: 210,
        crop_height: 210,
        crop_x: 10,
        crop_y: 10,
        // live preview size

    });
    Webcam.attach('#my_camera');


    // A button for taking snaps
    function take_snapshot() {
        // take snapshot and get image data
        Webcam.snap(function(data_uri) {
            // display results in page
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML =
                '<img id="image" src="' + data_uri + '" name="image"/>';

        });

    }

    function remove_snapshot() {

        Webcam.set({
            width: 300,
            height: 220,
            image_format: 'jpeg',
            jpeg_quality: 100,
            crop_width: 210,
            crop_height: 210,
            crop_x: 10,
            crop_y: 10,

        });
        Webcam.attach('#my_camera');
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
                console.log(res);
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
<!-- <script>
    $('input[list]').on('input', function(e) {
        var $input = $(e.target),
            $options = $('#' + $input.attr('list') + ' option'),
            $hiddenInput = $('#' + $input.attr('id') + '-hidden'),
            label = $input.val();

        $hiddenInput.val(label);

        for (var i = 0; i < $options.length; i++) {
            var $option = $options.eq(i);

            if ($option.text() === label) {
                $hiddenInput.val($option.attr('data-value'));
                break;
            }
        }
        // ajax
        var id = $('#answer-hidden').val(); // mendapatkan nilai value
        var url = '{{url('/visitor/')}}' + '/' + id;
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                if (res) {
                    $.each(res, function(key, value) {
                        console.log(res);
                        $('#alamat').empty();
                        $('#alamat').append($("<option/>", {
                            value: value['id'],
                            text: value['alamat']
                        }));

                    });

                }
            }
        });

    });
</script> -->


<script type="text/javascript">
    $("#submit").click(() => {

        var name = $("#namavisitor").val();
        var alamat = $("#alamat").val();
        var nokontak = $("#nokontak").val()
        var fungsiid = $("#fungsiid").find('option:selected').text();
        var karyawanid = $("#karyawanid").find('option:selected').text();
        var keperluan = $("#keperluan").val();
        var nokartu = $("#nokartu").find('option:selected').text();

        $("#modal-nama").val(name);
        $("#modal-alamat").val(alamat);
        $("#modal-kontak").val(nokontak);
        $("#modal-fungsi").val(fungsiid);
        $("#modal-karyawan").val(karyawanid);
        $("#modal-keperluan").val(keperluan);
        $("#modal-nokartu").val(nokartu);

    });
</script>



