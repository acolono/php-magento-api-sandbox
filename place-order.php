<?php
require_once 'api.php';

// The URL to your Magento 2 instance (ending with /index.php/rest/V1)
$api_url = 'http://YOUR-MAGENTO_DOMAIN/index.php/rest/V1';
// Set the integrations access token.
$token = 'YOUR-ACCESS-TOKEN';
// Fill in the SKU of the product which should be ordered.
$sku = 'PRODUCT-SKU-TO-ORDER';

$magento = new MagentoClient($token, $api_url);

$product = $magento->getProduct($sku);
$cart = $magento->createCart();
$cart = str_replace('"', '', $cart);

$order_filled = $magento->addToCart($cart, $sku, 1);
//var_dump($order_filled);

$ship_to = array (
  'addressInformation' =>
    array (
      'shippingAddress' =>
        array (
          'region' => 'Wien',
          'region_id' => 95,
          'country_id' => 'AT',
          'street' =>
            array (
              0 => 'Fillgradergasse 12-14/1a',
            ),
          'company' => 'acolono GmbH',
          'telephone' => '1111111',
          'postcode' => '1060',
          'city' => 'Vienna',
          'firstname' => 'Martin',
          'lastname' => 'Testman',
          'email' => 'testman@acolono.com',
          'prefix' => 'address_',
          'region_code' => 'W',
          'sameAsBilling' => 1,
        ),
      'billingAddress' =>
        array (
          'region' => 'Wien',
          'region_id' => 95,
          'country_id' => 'AT',
          'street' =>
            array (
              0 => 'Fillgradergasse 12-14/1a',
            ),
          'company' => 'acolono GmbH',
          'telephone' => '1111111',
          'postcode' => '1060',
          'city' => 'Vienna',
          'firstname' => 'Martin',
          'lastname' => 'Testman',
          'email' => 'testman@acolono.com',
          'prefix' => 'address_',
          'region_code' => 'W',
        ),
      'shipping_method_code' => 'flatrate',
      'shipping_carrier_code' => 'flatrate',
    ),
);

$order_shipment = $magento->setShipping($cart, $ship_to);
// var_dump($order_shipment);

//$payment = $magento->getPaymentMethods($cart);
//var_dump($payment);

$ordered = $magento->placeOrder($cart, 'cashondelivery');
echo "\nordered:\n";
var_dump($ordered);