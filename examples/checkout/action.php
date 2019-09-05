<?php

use Shipu\Bkash\Enums\BkashKey;
use Shipu\Bkash\Enums\BkashSubDomainType;

require_once './composer_load.php';

$tokenized = new Shipu\Bkash\Managers\Tokenized($config[BkashSubDomainType::CHECKOUT]);

$data = $_POST;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bkash Checkout</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
</head>
<body>
<span id="bKash_button"></span>


<script type="text/javascript">
  $(function () {
    var scriptLink = 'https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js';
    var successUrl = '<?=$data["success_url"]?>';
    var failedUrl = '<?=$data["failed_url"]?>';
    var amount = '<?=$data["amount"]?>';
    var ref_no = '<?=$data["ref_no"]?>';

    function errorMessage(response) {
      let msg = '?n_type=error';
      if(typeof response.errorMessage === 'undefined') {
        msg += '&n_key=payment_failed';
      } else {
        let errorMessage = '&n_msg=Sorry, your payment was unsuccessful !!! '+data.errorMessage;
        let errorCode = data.errorCode;
        let bkashErrorCode = [ 2001, 2002, 2003, 2004, 2007, 2008, 2009, 2011, 2012, 2013, 2020,
          2021, 2022, 2025, 2027, 2028, 2030, 2031, 2032, 2033, 2036, 2037, 2038, 2040, 2041, 2042,
          2043, 2044, 2045, 2046, 2047, 2048, 2049, 2050, 2051, 2052, 2053, 2054, 2055, 2056
        ];

        if(bkashErrorCode.includes(errorCode)) {
          errorMessage = '&n_key=payment_failed';
        } else if(errorCode == 2029) {
          errorMessage = '&n_msg=Sorry, your payment was unsuccessful !!! For same amount transaction, please try again after 10 minutes.';
        }

        msg += errorMessage;
      }
      return msg;
    }

    $.getScript(scriptLink)
      .done(function(script){
        //finished loading the script

        var paymentID = null;
        var bkashPaymentRequest = {
          amount: amount,
          intent: "sale",
          ref_no: ref_no,
          currency: "BDT",
        };

        //call the bkash init function
        bKash.init({
          paymentMode: 'checkout',
          paymentRequest: bkashPaymentRequest,
          createRequest: function (request) {
            // write your logic
            $.ajax({
              url: '{{ route("payment.bkash.checkout.create") }}',
              type: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(request),
              success: function (response) {
                data = response.data;
                if (data && data.paymentID != null) {
                  paymentID = data.paymentID;
                  bKash.create().onSuccess(data);
                } else {
                  bKash.create().onError();
                  window.location.href = failedUrl+"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Invalid Payment Id";
                }
              },
              error: function (xhr, textStatus, errorThrown) {
                bKash.create().onError();
                window.location.href = failedUrl+"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Invalid Request";
              }
            });

          },
          executeRequestOnAuthorization: function () {
            $.ajax({
              url: '{{ route("payment.bkash.checkout.execute") }}' + '/' + paymentID,
              type: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(bkashPaymentRequest),
              success: function (response) {
                data = response.data;
                if (data && data.paymentID != null) {
                  paymentID = null;
                  window.location.href = successUrl+"&n_type=success&n_key=payment_done";
                } else {
                  bKash.execute().onError();
                  window.location.href = failedUrl+errorMessage(data);
                }
              },
              error: function (xhr) {
                data = xhr.responseJSON;
                bKash.execute().onError();
                window.location.href = failedUrl+errorMessage(data);
              }
            });

          },
          onClose : function () {
            $.ajax({
              url: '{{ route("payment.bkash.checkout.close") }}',
              type: 'POST',
              contentType: 'application/json',
              success: function (response) {
                window.location.href = failedUrl"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Please try again !!!";
              },
              error: function () {
                window.location.href = failedUrl+"&n_type=error&n_msg=Sorry, your payment was unsuccessful !!! Please try again !!!";
              }
            });
          }
        });

        $('#bKash_button').click();

      });
  });
</script>
</body>
</html>


