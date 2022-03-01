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
    <p>Nama Tamu      : {{$details['namavisitor']}}</p>
    <p>Alamat Tamu    : {{$details['alamat']}}</p>
    <p>Keperluan Tamu : {{$details['keperluan']}}</p>
    <p>No Kontak HP   : {{$details['nokontak']}}</p>
    <p>Terima Kasih</p>
</body>
</html>