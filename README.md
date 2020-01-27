# inkybay-shopify-order-sdk
SDK to get order data from Inkybay Shopify order API.


<b>Follow the steps to setup SDK with Inkybay Shopify order API</b>

1. <b>Get your AccessKey, SecretKey & setup Hook URL</b>
Inkybay=>Settings=>Add-Ons=>Order Batch Download & Exporter=>Settings
After "Activate API" you will get your AccessKey, SecretKey
Hook URL is your server URL, where API will send 'orderId' &  'itemId' after the order process completed.

2. <b>Setup SDK</b>
Open conf.php and edit :
Set your accessKey on <code>'\_\_ACCESS_KEY_\_'</code>
Set your secretKey on  <code>'\_\_SECRET_KEY_\_'</code>

3. <b>Get order item data</b>
Where you need the order item data, just add bellow code to your PHP file :

<code>require_once('conf.php');</code><br/>
<code>$data = $orderService->getOrderItem('orderId', 'itemId', 'json');</code>

You will get <b>'orderId'</b>, & <b>'itemId'</b> from your hook URL by $_GET['orderId'] & $_GET['itemId']
Sample codes on : <a href="https://github.com/efoli-llc/inkybay-shopify-order-sdk/blob/master/item.php" target="_blank">item.php</a>


4. <b>Get order data</b>
Where you need all the order data, just add bellow code to your PHP file :

<code>require_once('conf.php');</code><br/>
<code>$data = $orderService->getOrder('orderId', 'json');</code>

You will get <b>'orderId'</b> from your hook URL by $_GET['orderId']
Sample codes on : <a href="https://github.com/efoli-llc/inkybay-shopify-order-sdk/blob/master/order.php" target="_blank">order.php</a>

--- Thanks.
Hope you will enjoy this SDK

NB : This SDK is only for Shopify store owner who installed <a href="https://apps.shopify.com/productsdesigner" target="_blank">Inkybay app of Shopify</a>
<hr>
Powered By : <a href="https://efoli.com" target="_blank">eFoli, LLC</a>



