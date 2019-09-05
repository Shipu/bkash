<h2>Checkout</h2>
<table width="100%">
    <tr>
        <th>Order</th>
        <th>Ref No.</th>
        <th>Amount</th>
        <th>Action</th>
    </tr>
    <tbody>
    <?php foreach ($orders as $order) {?>
        <tr style="text-align: center">
            <td><?=$order['code']?></td>
            <td><?=$order['ref_no']?></td>
            <td><?=$order['amount']?></td>
            <td>
                <form method="POST" action="./checkout/action.php">
                    <input type="hidden" name="payerReference" value="<?=$payerReference?>">
                    <input type="hidden" name="ref_no" value="<?=$order['ref_no']?>">
                    <input type="hidden" name="order_code" value="<?=$order['code']?>">
                    <input type="hidden" name="amount" value="<?=$order['amount']?>">
                    <input type="hidden" name="success_url" value="http://localhost:8003?status=success">
                    <input type="hidden" name="failed_url" value="http://localhost:8003?status=failed">
                    <button type="submit" class="button">Pay with bKash checkout</button>
                </form>
            </td>
        </tr>
    <?php }?>
    </tbody>

</table>
