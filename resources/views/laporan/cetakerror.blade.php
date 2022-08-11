<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>405 - ERROR</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/error.css')}}">
</head>

<body>
    <div id="error">
        

<div class="error-page container">
    <div class="col-md-8 col-12 offset-md-2">
        <img class="img-error" src="assets/images/samples/error-500.png" alt="Not Found" style="height: auto; width:500px; margin-left:150px;" >
        <div class="text-center">
            <h1 class="error-title">Error</h1>
            <p class="fs-5 text-gray-600">Maaf anda harus kembali untuk mengisi tanggal terlebih dahulu </p>
            <a href="{{('laporan/cetakformpertanggal')}}" class="btn btn-lg btn-outline-primary mt-3">Kembali</a>
        </div>
    </div>
</div>


    </div>
</body>

</html>
