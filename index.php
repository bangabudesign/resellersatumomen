<?php
    $uri_path = $_SERVER['REQUEST_URI'];
    $uri_segments = explode('/', $uri_path);
	$domain = 'https://domainanda.com'; //EDIT VALUE INI
	$invitation_link = 'ari-dan-dian'; //EDIT VALUE INI
	$meta_title = 'The Wedding of Ari & Dian'; //EDIT VALUE INI
	$meta_desc = 'Tanpa mengurangi rasa hormat kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara resepsi pernikahan kami'; //EDIT VALUE INI
    $invitation = null;
    if ($uri_segments[1] != "preview") {
        $curl_handle = curl_init();
        $url = 'https://satumomen.com/api/u/'.$invitation_link;
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $response_data = json_decode($curl_data);
        $invitation = $response_data->invitation;
    }
    $path = ($uri_segments[1] == "app" ? $uri_segments[1] : $invitation_link.($_GET ? '?to='.strip_tags($_GET['to']) : '' )) . (isset($uri_segments[2]) ? '/' . $uri_segments[2] : '') . (isset($uri_segments[3]) ? '/' . $uri_segments[3] : '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $invitation ? strip_tags($invitation->heading) : $meta_title ?></title>
    <meta name="title" content="<?php echo $invitation ? strip_tags($invitation->heading) : $meta_title ?>">
    <meta name="description" content="<?php echo $invitation ? strip_tags($invitation->introduction) : $meta_desc ?>">
    <meta itemprop="image" content="<?php echo $invitation ? $invitation->cover_url : $domain.'/thumbnail.jpg' ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php $domain ?>">
    <meta property="og:title" content="<?php echo $invitation ? strip_tags($invitation->heading) : $meta_title ?>">
    <meta property="og:description" content="<?php echo $invitation ? strip_tags($invitation->introduction) : $meta_desc ?>">
    <meta property="og:image" content="<?php echo $invitation ? $invitation->cover_url : $domain.'/thumbnail.jpg' ?>">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $invitation ? strip_tags($invitation->heading) : $meta_title ?>">
    <meta name="twitter:description" content="<?php echo $invitation ? strip_tags($invitation->introduction) : $meta_desc ?>">
    <meta name="twitter:image" content="<?php echo $invitation ? $invitation->cover_url : $domain.'/thumbnail.jpg' ?>">
</head>

<body style="position:fixed; top:0; right: 0; bottom:0; left:0; margin:0">
    <iframe id="myFrame" style="height:100%; width: 100%;" allowusermedia allow="camera" allowfullscreen src="<?php echo 'https://satumomen.com/' . $path ?>" frameborder="0"></iframe>
</body>

</html>
