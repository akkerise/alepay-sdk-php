<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css">
    <title>Form</title>
</head>
<body>
<div class="row">
    <div class="row">
        <form class="col s6" method="POST" action="success.php">
            <h4 class="center">THÔNG TIN KHÁCH HÀNG</h4>
            <div class="row">
                <div class="input-field col s3">
                    <input placeholder="First Name" name="first_name" id="first-name" type="text" class="validate">
                </div>
                <div class="input-field col s3">
                    <input placeholder="Last Name" name="last_name" id="last-name" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Street" name="street" id="street" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s4">
                    <input placeholder="City" name="city" id="city" type="text" class="validate">
                </div>
                <div class="input-field col s2">
                    <input placeholder="State" name="state" id="state" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Số Thẻ" name="card_name" id="card-number" type="number" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input placeholder="Ngày Hết Hạn" name="date_time" type="date" class="validate">
                </div>
                <div class="input-field col s3">
                    <input placeholder="CVC" type="password" class="validate" maxlength="3">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Phone Number" name="phone_number" id="phone-number" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Post Code" name="postal_code" id="postal_code" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="Country" name="country" id="country" type="text" class="validate">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="email" id="email" type="email" class="validate" placeholder="Email">
                </div>
            </div>
            <!--        <a id="download-button" type="submit" class="btn-large waves-effect waves-light">Submit</a>-->
            <button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
        </form>
</div>
</body>
</html>