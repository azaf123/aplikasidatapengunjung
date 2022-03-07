<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
</head>
<body>
    <p>Selamat Pagi/Siang Bapak/ibu yang terhormat </p>
    <p>Kepada Bapak/Ibu {{$details['namakaryawan']}} </p>
    <p>Kami menginformasikan bahwa Bapak/Ibu kedatangan tamu</p>
    <p>Nama Tamu        : <b>{{$details['namavisitor']}}</b></p>
    <p>Alamat Tamu      : <b>{{$details['alamat']}}</b></p>
    <p>Keperluan Tamu   : <b>{{$details['keperluan']}}</b></p>
    <p>No Kontak HP     : <b>{{$details['nokontak']}}</b></p>
    <p>Waktu Kunjungan  : <b>{{$details['waktu']}}</b></p>
    <p>Terima Kasih</p>
    <p>Foto Pengunjung</p>
    <img src="{{$message->embed('img/'. $details['image'])}}" alt="">
    
</body>
</html>