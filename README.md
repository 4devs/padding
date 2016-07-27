Padding
=======

[![Build Status](https://travis-ci.org/4devs/padding.svg?branch=master)](https://travis-ci.org/4devs/padding)

## Installation
Padding uses Composer, please checkout the [composer website](http://getcomposer.org) for more information.

The simple following command will install `fdevs/padding` into your project. It also add a new
entry in your `composer.json` and update the `composer.lock` as well.


```bash
composer require fdevs/padding
```

## Usage examples

### basic usage

```php
<?php
use FDevs\Padding\Pkcs7;
use FDevs\Padding\NoPadding;

$padding = new Pkcs7();

$data = '';//your data without padding
$blockSize = 32;//your block size default 32
$paddingData = $padding->pad($data,$blockSize);

echo $padding->unpad($paddingData, $blockSize); 
```

### usage with mcrypt

```php
<?php
use FDevs\Padding\Pkcs7;

$padding = new Pkcs7();

$data = '';//your data without padding
$key = '';//your secret keys
$blockSize = mcrypt_get_block_size('des', 'ecb');

echo mcrypt_encrypt(MCRYPT_DES, $key, $padding->pad($data,$blockSize), MCRYPT_MODE_ECB);

$str = '';//crypto data
$paddingData = $str = mcrypt_decrypt(MCRYPT_DES, $key, $str, MCRYPT_MODE_ECB);

echo $padding->unpad($paddingData, $blockSize); 
```


License
-------

This library is under the MIT license. See the complete license in the library:

    LICENSE


---
Created by [4devs](http://4devs.pro/) - Check out our [blog](http://4devs.io/) for more insight into this and other open-source projects we release.
