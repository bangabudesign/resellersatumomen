<?php
    $uri_path = $_SERVER['REQUEST_URI'];
    $uri_segments = explode('/', $uri_path);
    $invitation = null;
    
    if ($uri_segments[2] != "preview") {
        $curl_handle = curl_init();
        $url = 'https://satumomen.com/api/u/'.$uri_segments[2];
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $response_data = json_decode($curl_data);
        $invitation = $response_data->invitation;
    }
    $path = ($uri_segments[2] == "preview" ? $uri_segments[2] : ($uri_segments[2] == "app" ? $uri_segments[2] : 'u/'.$uri_segments[2])) . (isset($uri_segments[3]) ? '/' . $uri_segments[3] : '') . (isset($uri_segments[4]) ? '/' . $uri_segments[4] : '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Digital</title>
    <meta name="title" content="<?php echo $invitation ? strip_tags($invitation->heading) : 'Undangan Digital' ?>">
    <meta name="description" content="<?php echo $invitation ? strip_tags($invitation->introduction) : 'Undangan pernikahan online atau undangan pernikahan digital dengan desain website ekslusif.' ?>">
    <meta itemprop="image" content="<?php echo $invitation ? $invitation->cover_url : 'https://websiteanda.com/undangan/logo.jpg' ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://websiteanda.com">
    <meta property="og:title" content="<?php echo $invitation ? strip_tags($invitation->heading) : 'Undangan Digital' ?>">
    <meta property="og:description" content="<?php echo $invitation ? strip_tags($invitation->introduction) : 'Undangan pernikahan online atau undangan pernikahan digital dengan desain website ekslusif.' ?>">
    <meta property="og:image" content="<?php echo $invitation ? $invitation->cover_url : 'https://websiteanda.com/undangan/logo.jpg' ?>">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $invitation ? strip_tags($invitation->heading) : 'Undangan Digital' ?>">
    <meta name="twitter:description" content="<?php echo $invitation ? strip_tags($invitation->introduction) : 'Undangan pernikahan online atau undangan pernikahan digital dengan desain website ekslusif.' ?>">
    <meta name="twitter:image" content="<?php echo $invitation ? $invitation->cover_url : 'https://websiteanda.com/undangan/logo.jpg' ?>">
</head>

<body style="position:fixed; top:0; right: 0; bottom:0; left:0; margin:0">
    <iframe id="myFrame" style="height:100%; width: 100%;" src="<?php echo 'https://satumomen.com/' . $path ?>" frameborder="0">
    </iframe>
</body>

</html>
