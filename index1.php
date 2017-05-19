<?php

require('Lib/Alepay.php');

$callbackUrl = 'http://' . $_SERVER['SERVER_NAME'];
if($_SERVER['SERVER_PORT'] != '80'){
    $callbackUrl = $callbackUrl . ':' . $_SERVER['SERVER_PORT'];
}
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$callbackUrl = $callbackUrl . $uri_parts[0];

$alepay = new Alepay(array(
    "apiKey" => "",
    "encryptKey" => "",
    "checksumKey" => "",
    "callbackUrl" => $callbackUrl

    ));
//echo "<pre>"; var_dump($alepay); echo "</pre>"; die();
if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendOrderToAlepay') {
    //@MERCHANT : IF MERCHANT USE DIRECTLY DATA FROM INPUT
    $data = getDataFromClient();
    //@MERCHANT : IF MERCHANT USE DATA FROM DATABASE QUERY
    //$data = queryOrderDataFromDatabase();
    $alepay->sendOrderToAlepay($data);
}
else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendCardLinkRequest') {
    $data = getDataFromClient();
    $response = $alepay->sendCardLinkRequest($data);
    if(array_key_exists('url', $response)){
        header('Location:' .$response->url);
    }
    else{
        echo json_encode($response);
    }
}
else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'getTransactionInfo' ) {
    $data = $_POST['transactionCode'];
    $alepay->getTransactionInfo($data);
}
else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'sendTokenizationPayment') {
    $tokenization = $_POST['tokenization'];
    $response = $alepay->sendTokenizationPayment($tokenization);
    if(array_key_exists('checkoutUrl', $response)){
        header('Location:' .$response->checkoutUrl);
    }
    else{
        echo json_encode($response);
    }
}
else if (isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'cancelCardLink') {
    $data = $_POST['alepayToken'];
    $cardlinkUrl = $alepay->cancelCardLink($data);
}
else if(isset($_POST) && isset($_GET['action']) && $_GET['action'] == 'calculateFee'){
    $data = getDataFromClient();
    $alepay->calculateFee($data);
}
else if(isset($_GET['data'])){
    $data = $_GET['data'];
    echo $alepay->decryptCallbackData($data);
}
function getDataFromClient(){
    return json_decode(file_get_contents('php://input'), true);
}
?>