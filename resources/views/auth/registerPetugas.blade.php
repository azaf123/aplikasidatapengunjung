<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    Pendaftaran - PT Pertamina Patra Niaga Admin Dashoard
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo-custom mb-5" style="text-align: center;">
                        <a href="{{url('/landingpage')}}"><img src="{{asset('assets\images\logo\pertamina.png')}}" class="img-fluid" alt="Logo" style="width:300px; height:200px; margin-top:-80px;"></a>
                    </div>
                    <h3>Daftar Petugas</h3>

                    <form method="POST" action="{{ url('/registerPetugas') }}">
                        @csrf
                        <label for="">Username</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror form-control-xl" placeholder="Username" name="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <label for="">Nama Lengkap</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('fullname') is-invalid @enderror form-control-xl" placeholder="Nama Lengkap Petugas" name="fullname">
                            @error('fullname')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <label for="">Nomor Pegawai</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('nopegawai') is-invalid @enderror form-control-xl" placeholder="Nomor Pegawai" name="nopegawai">
                            @error('nopegawai')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <label for="">Email</label>
                        <div class="form-group">
                            <input type="text" class="form-control @error('email') is-invalid @enderror form-control-xl" placeholder="Email" name="email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <label for="">Password</label>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-xl" placeholder="Password" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <label for="">Ulangi Password</label>
                        <div class="form-group">
                            <input type="password" class="form-control @error('retypepassword') is-invalid @enderror form-control-xl" placeholder="Confirm Password" name="retypepassword">
                            @error('retypepassword')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah ada akun <a href="{{ url('loginPetugas') }}" class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>

<style>
    label{
        font-weight: bold;
    }
</style>