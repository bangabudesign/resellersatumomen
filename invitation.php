<?php
$uri_path = $_SERVER['REQUEST_URI'];
$uri_segments = explode('/', $uri_path);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNDI - Undangan Digital Indonesia</title>
    <meta name="title" content="UNDI - Undangan Digital Indonesia">
    <meta name="description" content="Bagikan Momen Terindahmu Dengan Cepat, Tepat Dan Hemat Bersama Undi Undangan Digital">
    <meta itemprop="image" content="https://undi.co.id/undangan/logo.jpg">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://undi.co.id">
    <meta property="og:title" content="UNDI - Undangan Digital Indonesia">
    <meta property="og:description" content="Bagikan Momen Terindahmu Dengan Cepat, Tepat Dan Hemat Bersama Undi Undangan Digital">
    <meta property="og:image" content="https://undi.co.id/undangan/logo.jpg">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="UNDI - Undangan Digital Indonesia">
    <meta name="twitter:description" content="Bagikan Momen Terindahmu Dengan Cepat, Tepat Dan Hemat Bersama Undi Undangan Digital">
    <meta name="twitter:image" content="https://undi.co.id/undangan/logo.jpg">
</head>

<body style="position:fixed; top:0; right: 0; bottom:0; left:0; margin:0">
    <iframe id="myFrame" style="height:100%; width: 100%;" src="<?php echo 'https://satumomen.com/' . ($uri_segments[2] == "preview" ? $uri_segments[2] : 'u/'.$uri_segments[2]) . ($uri_segments[3] ? '/' . $uri_segments[3] : '') ?>" frameborder="0">
    </iframe>
    
    <script>
    function myFunction() {
      var iframe = document.getElementById("myFrame");
      var elmnt = iframe.contentWindow.document.querySelector("head meta[property='og:image']");
      console.log(elmnt);
    }
    
    myFunction();
    </script>
</body>

</html>