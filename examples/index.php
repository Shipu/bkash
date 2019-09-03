<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkash Tokenize</title>
</head>
<body>
<?php
    $orders = [
        [
            'code'   => 'Order001',
            'amount' => '5'
        ],
        [
            'code'   => 'Order002',
            'amount' => '7'
        ],
        [
            'code'   => 'Order001',
            'amount' => '10'
        ],
    ];

?>

<table>
    <tr>
        <th>Order</th>
        <th>Amount</th>
        <th>Action</th>
    </tr>
    <tbody>
        <?php foreach ($orders as $order) {?>
            <tr>
                <td><?=$order['code']?></td>
                <td><?=$order['amount']?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="order_id" value="<?=$order['code']?>">
                        <input type="hidden" name="order_id" value="<?=$order['amount']?>">
                        <button type="submit">Pay with bKash Tokenized</button>
                    </form>
                </td>
            </tr>
        <?php }?>
    </tbody>


</table>

</body>
</html>
