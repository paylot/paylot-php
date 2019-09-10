# paylot-php

A PHP API wrapper for [Paylot](https://paylot.co/).

[![Paylot](img/paylot.png?raw=true "Paylot")](https://paylot.co/)

## Requirements
- Guzzle 6.3.0 or more recent (Unless using Guzzle)
- PHP 5.4.0 or more recent
- OpenSSL v1.0.1 or more recent

## Install

### Via Composer

``` bash
    $ composer require paylot/paylot-php
```

### Via download

Download a release version from the [releases page](https://github.com/paylot/paylot-php/releases).
Extract, then:
``` php
    require 'path/to/src/autoload.php';
```

## Usage

To use, follow the following.

### 0. Prerequisites
Confirm that your server can conclude a TLSv1.2 connection to Paylot's servers. Most up-to-date software have this capability. Contact your service provider for guidance if you have any SSL errors.
*Don't disable SSL peer verification!*

### 0b. Secret Key
Please, ensure you have your Paylot secret key handy. You can obtain that from your business profile.

### 1. Verify Transaction
After a successful transaction, please verify the transaction before giving value.

```php
    $reference = isset($_GET['reference']) ? $_GET['reference'] : '';
    if(!$reference){
      die('No reference supplied');
    }

    // initiate the Library's Paystack Object
    $paylot = new Paylot\Paylot(SECRET_KEY);
    try
    {
      // verify using the library
      $tranx = $paylot->transaction->verify($reference);
    } catch(\Paylot\Exceptions\ApiException $e){
      print_r($e->getResponseObject());
      die($e->getMessage());
    }

    if ($tranx->sent) {
      // Payment has been made. You can give value
    }
    
    if ($tranx->confirmed) {
      // Payment has been confirmed on blockchain. 
      // If you don't give value here, I don't know what you are waiting for.
    }
```

