<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login - PT Pertamina Patra Niaga Admin Dashoard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css') }}">
</head>

<body>

    @include('sweetalert::alert')
    <div id="auth">
        <div class="row">
            <div class="col">
                @if (session('status'))
                @endif
            </div>
        </div>
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo-custom mb-5" style="text-align: center;">
                        <a href="{{url('/landingpage')}}"><img src="{{asset('assets\images\logo\pertamina.png')}}" class="img-fluid" alt="Logo" style="width:300px; height:200px; margin-top:-80px;"></a>
                    </div>
                    <h1>Log in Petugas</h1>
                 

                    <form method="POST" action="{{ url('/loginPetugas') }}">
                        @csrf
                        <div class="form-group">
                            <!-- put value from input -->
                            <input type="text" class="form-control @error('email') is-invalid @enderror form-control-xl form-control-xl" placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-xl" placeholder="Password" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum punya akun? <a href="{{ url('/registerPetugas') }}" class="font-bold">
                            Daftar</a>.</p>
                            <p class="text-gray-600">Masuk sebagai admin <a href="{{ url('/login') }}" class="font-bold">Klik Saya</a></p>
                       
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
