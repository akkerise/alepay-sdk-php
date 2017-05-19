<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/19/17
 * Time: 4:36 PM
 */
session_start();
//echo "<pre>"; var_dump($_SERVER); echo "</pre>"; die();
$obj_data = json_decode($_SESSION['test1']);
//echo "<pre>";
//var_dump($obj_data->data);
//echo "</pre>";
//die();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Show Data</title>
</head>
<body>
<div id="container">
    <div class="row">
        <div class="col s3"></div>
        <div class="col s6 center">
            <h3>Result</h3>
            <ul class="collection col-md-8">
                <li class="collection-item">
                    <div>
                        <h6>Tên Người Giữ Thẻ : </h6><p><?php echo $obj_data->data->cardHolderName ?></p>
                    </div>
                </li>
                <li class="collection-item">
                    <div>
                        <h6>Email : </h6><p><?php echo $obj_data->data->email ?></p>
                    </div>
                </li>
                <li class="collection-item">
                    <div>
                        <h6>Ngày Hết Hạn Thẻ : </h6><p><?php echo $obj_data->data->cardExpireMonth . '/' . $obj_data->data->cardExpireYear ?></p>
                    </div>
                </li>
                <li class="collection-item">
                    <div>
                        <h6>Phương Thức Thanh Toán : </h6><p><?php echo $obj_data->data->paymentMethod ?></p>
                    </div>
                </li>
                <li class="collection-item">
                    <div>
                        <h6>Thông Qua Ngân Hàng : </h6><p><?php echo $obj_data->data->bankCode ?></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
