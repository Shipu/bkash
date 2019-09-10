<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkash</title>
    <style>
        html {
            font-size: 20px;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 5px 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 15px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php
    require_once './dummy_data.php';
    require_once './tokenized/tokenized_order_list.php';
    echo "<br><br>";
    require_once './checkout/checkout_order_list.php';
?>
</body>
</html>
