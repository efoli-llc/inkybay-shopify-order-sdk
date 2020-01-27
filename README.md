# SDK to get order data from Inkybay Shopify order API.
SDK to get order data from Inkybay Shopify order API.
<br/>
<b>Follow the steps to setup SDK with Inkybay Shopify order API</b><br/>
<br/>
1. <b>Get your AccessKey, SecretKey & setup Hook URL</b><br/>
Inkybay=>Settings=>Add-Ons=>Order Batch Download & Exporter=>Settings<br/>
After "Activate API" you will get your AccessKey, SecretKey<br/>
Hook URL is your server URL, where API will send 'orderId' &  'itemId' after the order process completed.<br/>
<br/>
2. <b>Setup SDK</b><br/>
Open conf.php and edit :<br/>
Set your accessKey on <code>'__ACCESS_KEY__'</code><br/>
Set your secretKey on  <code>'__SECRET_KEY__'</code><br/>
<br/>
3. <b>Get order item data</b><br/>
Where you need the order item data, just add bellow code to your PHP file :<br/>
<br/>
<code>require_once('conf.php');</code><br/>
<code>$data = $orderService->getOrderItem('orderId', 'itemId', 'json');</code><br/>
<br/>
You will get <b>'orderId'</b>, & <b>'itemId'</b> from your hook URL by $_GET['orderId'] & $_GET['itemId']<br/>
Sample codes on : <a href="https://github.com/efoli-llc/inkybay-shopify-order-sdk/blob/master/item.php" target="_blank">item.php</a><br/>
<br/>
4. <b>Get order data</b><br/>
Where you need all the order data, just add bellow code to your PHP file :<br/>
<br/>
<code>require_once('conf.php');</code><br/>
<code>$data = $orderService->getOrder('orderId', 'json');</code><br/>
<br/>
You will get <b>'orderId'</b> from your hook URL by $_GET['orderId']<br/>
Sample codes on : <a href="https://github.com/efoli-llc/inkybay-shopify-order-sdk/blob/master/order.php" target="_blank">order.php</a><br/>
<br/>
<br/>
--- Thanks.<br/>
Hope you will enjoy this SDK<br/>
<br/>
NB : This SDK is only for Shopify store owner who installed <a href="https://apps.shopify.com/productsdesigner" target="_blank">Inkybay app of Shopify</a><br/>
<hr><br/>
Powered By : <a href="https://efoli.com" target="_blank">eFoli, LLC</a>



