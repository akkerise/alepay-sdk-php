<?php
session_start();
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/9/17
 * Time: 3:12 PM
 */
require('Lib/Alepay.php');
$callbackUrl = 'http://' . $_SERVER['SERVER_NAME'];
if ($_SERVER['SERVER_PORT'] != '80') {
    $callbackUrl = $callbackUrl . ':' . $_SERVER['SERVER_PORT'];
}
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$encryptKey = "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCIh+tv4h3y4piNwwX2WaDa7lo0uL7bo7vzp6xxNFc92HIOAo6WPZ8fT+EXURJzORhbUDhedp8B9wDsjgJDs9yrwoOYNsr+c3x8kH4re+AcBx/30RUwWve8h/VenXORxVUHEkhC61Onv2Y9a2WbzdT9pAp8c/WACDPkaEhiLWCbbwIDAQAB";
$callbackUrl = $callbackUrl . $uri_parts[0];


$alepay = new Alepay(array(
    // db dev
    // "apiKey" => "yTsl7Ycg9uhIl04EduMQoOuJWhQdZ6",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC9vIbL4rPQSu3TW/MxakvwWplDarB9lBa3jlp2V1IVkPdzk3PbWWAeWM/RuHEGlvRpX8xCQEG5AzC60XXpNUT5JpqldSlyyJVdvsuDLd/BVEZ/rnC4PkOFV07XdgCn1MWwptZJkFnAY2yXTJNBxZeo+f705gQ0Mxc6cTfWjlV3bwIDAQAB",
    // "checksumKey" => "rYcX5D6Sb7JwUtglw4AWttt2g2MHsE",

    // db test
    "apiKey" => "0COVspcyOZRNrsMsbHTdt8zesP9m0y",
    "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCIh+tv4h3y4piNwwX2WaDa7lo0uL7bo7vzp6xxNFc92HIOAo6WPZ8fT+EXURJzORhbUDhedp8B9wDsjgJDs9yrwoOYNsr+c3x8kH4re+AcBx/30RUwWve8h/VenXORxVUHEkhC61Onv2Y9a2WbzdT9pAp8c/WACDPkaEhiLWCbbwIDAQAB",
    "checksumKey" => "hjuEmsbcohOwgJLCmJlf7N2pPFU1Le",

    // joombooking
    // "apiKey" => "r7CcL19wBEix1ScJXv7ZXy9NoL0Ub8",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCTM7z4P0XkP7pzMennhtShndJ/FcQbYZ2hxypzpzcRU2zi74B4hlrN2uBFjY7obuF68F7SGt72J0bcM9w74aBjCb5YAQX8JOD6IlZsdSCPzMwEpCALKaIUEsZ/npNQEf/RmMOV8RNfJDY2/6ElvUgCu7+eGkabl6Ete8fiI9TYKwIDAQAB",
    // "checksumKey" => "mCPjtDOYyGcg3b6IGIl3lSwCbMKq6m",

    // weshop
    // "apiKey" => "FsIFYpHt42GGDgji5SmLkLDqKRV9tt",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDO8WZFC2Hwj4JmBUZN8naZetVISLyg6CCW+EhmUCPRswblGhjjxbk4+aYzkq0itmQFJ8paUJMeql2NAN4E9cBmQ0OaOqNzHeq/aGJV0sdxEga1UpqGcq2BHXYhDQHe9RQ/rSIJXxR4WhxpcZcxZdj0qrswxoPPubeKFBc+fHBdxQIDAQAB",
    // "checksumKey" => "RukyMrAGCyLeBCbfeEw2erzzao2htH",

    // live db
    // "apiKey" => "imt4pZsjbCDE2ioVxnQs71wzNv4TZW",
    // "encryptKey" => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCVdQKI15hS23XGT9DBQzIardNBBCPa86XeEhMzP2TKKi737SBUXg+z/o3BNhcFZRdTsL5uQpAmBEP3IJYEvclOGgOyWBbpjUf0MXENexaXB9gX9fI/bEiso7k0shBdi8dZt1FdabX/NSTzM+WcQElgLYgXnlwoyCiyzOFL60V4BwIDAQAB",
    // "checksumKey" => "5iaPavRj8FQXb6eXCj7gFcXC43jsg5",
    "callbackUrl" => $callbackUrl

));
// Check REQUEST_METHOD is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['action'] === 'sendCardLinkRequest') {
        if ($_POST['first_name'] || $_POST['last_name'] || $_POST['street']
            || $_POST['city'] || $_POST['state'] || $_POST['card_name']
            || $_POST['date_time'] || $_POST['phone_number']
            || $_POST['post_code'] || $_POST['country'] || $_POST['email']
        ) {
            $param_id = preg_replace('/\s+/', '', $_POST['first_name']) . '-' . time();
            $data = [
                'id' => $param_id,
                'firstName' => $_POST['first_name'],
                'lastName' => $_POST['last_name'],
                'street' => $_POST['street'],
                'city' => $_POST['city'],
                'state' => $_POST['state'],
                'postalCode' => $_POST['postal_code'],
                'country' => $_POST['country'],
                'email' => $_POST['email'],
                'phoneNumber' => $_POST['phone_number'],
                'callback' => $callbackUrl
            ];
            $dataFake = [
                'id' => $param_id,
                'firstName' => 'AkKe',
                'lastName' => 'Rise',
                'street' => 'Gầm Cầu Vĩnh Tuy',
                'city' => 'Phố Núi',
                'state' => 'Mù Cang Chải',
                'postalCode' => '88888888',
                'country' => 'Việt Nam',
                'email' => 'akkerise@gmail.com',
                'phoneNumber' => '0988888888',
                'callback' => $callbackUrl
            ];
            $response = $alepay->sendCardLinkRequest($dataFake);
            $deResponse = json_decode($response);
//            echo "<pre>"; var_dump((string)$deResponse->url); echo "</pre>"; die();
            header('Location: ' . $deResponse->url);
        } else {
            echo "<pre>";
            var_dump($_SERVER);
            echo "</pre>";
            exit();
        }
    } else {
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
        exit();
    }
}
if (isset($_GET['data']) && isset($_GET['checksum'])) {
//    echo "<pre>";var_dump($encryptKey);echo "</pre>";exit();
    $test = new AlepayUtils();
    $test1 = $test->decryptCallbackData($_GET['data'], $encryptKey);
    $_SESSION['test1'] = $test1;
//    echo "<pre>"; var_dump($_SERVER); echo "</pre>"; die();
//    echo "<pre>"; var_dump('http://' .$_SERVER['SERVER_NAME']); echo "</pre>"; die();
    header('Location: ' . 'http://' . $_SERVER['HTTP_HOST'] . '/alepay/alepay-sdk-php/result.php' );
    echo "<pre>";
    var_dump($_SESSION['test1']);
    echo "</pre>";
    exit();
}
?>