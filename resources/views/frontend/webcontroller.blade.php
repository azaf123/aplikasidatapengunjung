$reqfoto = $request->image;
        $foto = substr($reqfoto,strpos($reqfoto, ',') + 1);
        $dekod = base64_decode($foto);
        $file_name = "img- " .time().rand(11111,99999). ".png";
        $folder = public_path('img/');
        $fp = fopen($folder.$file_name,'w');
        fwrite($fp, $dekod);
        fclose($fp);
        $request->image = $file_name;