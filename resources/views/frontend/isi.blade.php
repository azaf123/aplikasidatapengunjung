<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Buku Tamu</title>
</head>

<body>
    <style>
        #my_camera {
            width: 320px;
            height: 240px;
            border: 1px solid black;
        }
    </style>

    <!-- -->
    <div id="my_camera"></div>
    <input type=button value="Configure" onClick="configure()">
    <input type=button value="Take Snapshot" onClick="take_snapshot()">
    <input type=hidden name="image" class="image-tag">
    <div id="results"></div>
</body>

</html>

<!-- Script -->
<script type="text/javascript" src="{{asset('webcam/webcam.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  

 
<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">
    // Configure a few settings and attach camera
    function configure() {
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
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