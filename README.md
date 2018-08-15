Installation
----------------------------------------------------------------
This is based on next-sentence/afterbuy-sdk

Require the bundle and its dependencies with composer:

    $ composer require weslinkde/afterbuy-sdk
 
or add it manually:
```
  "require": {
    "weslinkde/afterbuy-sdk" : "@dev"
  }
        }
  ```

Usage
----------------------------------------------------------------

```php
<?php
      
      require_once __DIR__ . './../vendor/autoload.php';
      
      $config = array(
          'userId'     => 'userid',
          'userPass' => 'userpass',
          'partnerId'    => '123456',
          'partnerPass'    => '123',
          'errorLang'    => 'en',
      );
      
      
      $factory  = new Ns\Afterbuy\Factory();
      $api = $factory->createRequest($config);
      try {
          $soldItems =  $api->getSoldItems();
          $result = $soldItems->getResult();
          var_dump($result);
      } catch (Exception $e) {
          echo $e;
      }
```




The response will be an instance of `Ns\Afterbuy\Model\UpdateSoldItems\UpdateSoldItemsResponse`.


Another Sample Code with Filter usage
```php
<?php
      
     public function get_afterbuy_config()
    {

        $wp_afterbuy_settings = get_option('wp_afterbuy_settings');
        return array(
            'userId'     => 'xxx',
            'userPass' => 'xxx',
            'partnerId'    => 'xxx',
            'partnerPass'    => 'xxx',
            'errorLang'    => 'en',
        );
    }

     public function get_afterbuy_product_by_id($product_id)
    {
        $config = $this->get_afterbuy_config();

        $factory = new Ns\Afterbuy\Factory();
        $api = $factory->createRequest($config);
        try {
            $filter = new Ns\Afterbuy\Model\GetShopProducts\Filter\ProductFilter($product_id);
            $items = $api->getShopProducts(array($filter));
            $result = $items->getResult()->getProducts();
            $product_info = explode(": ", $result[0]->freeValue6);

            return [
                'id' => $result[0]->productId,
                'name' => $product_info[1],
                'selling_price' => $result[0]->sellingPrice->getValue(),
                'dealer_price' => $result[0]->dealerPrice->getValue(),
                'image' => $result[0]->imageSmallURL,
                'unit_of_quantity' => $result[0]->unitOfQuantity,
                'base_price_factor' => $result[0]->basepriceFactor->getValue()
            ];
        } catch (Exception $e) {
            return $e;
        }
    }




```

Dependencies
----------------------------------------------------------------
* `jms/serializer` - Allows you to easily serialize, and deserialize data of any complexity
* `guzzlehttp/guzzle` - Guzzle is a PHP HTTP client library
* `monolog/monolog` - Monolog lib
