# Place a magento order via API

This is a sandbox module to place a order in a Magento 2 shop via api. We use it as a demo application for our [OpenTrigger](https://www.opentrigger.com) System.

The API examples are mostly taken from [this magento.stackexchage.com entry](http://magento.stackexchange.com/questions/136028/magento-2-create-order-using-rest-api)

## Create api key in Magento:

- Go to: System -> Integrations -> "Add new integration"
- Create a new Integration with sufficient permissions (e.g. set Ressource Access to "All" if you are just playing around)
- Note down the created Access Token for usage in place-order.php

## Configure place-order.php

Set valid values for `$api_url`, `$token` and `$sku`.

## Execute order
``php place-order.php``


