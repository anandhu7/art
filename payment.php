Please Wait...
<?php
$radn_num=rand();
$secretKey = "bb8bd804cfaa1bc561e9103f371eb2ed2bca7c72";
$postData = array(
"appId" => '15095cf9f6a90fb78a12bc8f959051',
"orderId" =>$radn_num,
"orderAmount" => $_GET['orderAmount'],
"orderCurrency" => 'INR',
"orderNote" =>'Art World Payment',
"customerName" => $_GET['customerName'],
"customerPhone" => '9999999999',
"customerEmail" =>  'artworld'.$radn_num.'@test.com',
"returnUrl" => 'http://localhost/artworld/site/response.php?order_id='.$_GET['orderId'],
"notifyUrl" => 'http://localhost/artworld/site/response.php',
);
// get secret key from your config
ksort($postData);
$signatureData = "";
foreach ($postData as $key => $value){
    $signatureData .= $key.$value;
}
$signature = hash_hmac('sha256', $signatureData, $secretKey,true);
$signature = base64_encode($signature);
?>
<form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
    <input type="hidden" name="appId" value="15095cf9f6a90fb78a12bc8f959051"/>
    <input type="hidden" name="orderId" value="<?php echo $radn_num; ?>"/>
    <input type="hidden" name="orderAmount" value="<?php echo $_GET['orderAmount']; ?>"/>
    <input type="hidden" name="orderCurrency" value="INR"/>
    <input type="hidden" name="orderNote" value="Art World Payment"/>
    <input type="hidden" name="customerName" value="<?php echo $_GET['customerName']; ?>"/>
    <input type="hidden" name="customerEmail" value="artworld<?php echo $radn_num; ?>@test.com"/>
    <input type="hidden" name="customerPhone" value="9999999999"/>
    <input type="hidden" name="returnUrl" value="http://localhost/artworld/site/response.php?order_id=<?php echo $_GET['orderId']; ?>"/>
    <input type="hidden" name="notifyUrl" value="http://localhost/artworld/site/response.php"/>
    <input type="hidden" name="signature" value="<?php echo $signature; ?>"/>
  </form>
  <script>
  document.getElementById("redirectForm").submit();
  </script>