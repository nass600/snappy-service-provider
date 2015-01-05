# Snappy Service Provider #

Silex Service for `snappy` library integration

[![Latest Stable Version](https://poser.pugx.org/nass600/snappy-service-provider/v/stable.png)](https://packagist.org/packages/nass600/snappy-service-provider)
[![Total Downloads](https://poser.pugx.org/nass600/snappy-service-provider/downloads.png)](https://packagist.org/packages/nass600/snappy-service-provider)
[![License](https://poser.pugx.org/nass600/snappy-service-provider/license.svg)](https://packagist.org/packages/nass600/snappy-service-provider)
[![Build Status](https://api.travis-ci.org/nass600/snappy-service-provider.svg?branch=master)](https://travis-ci.org/nass600/snappy-service-provider)


## Installation ##

Require the library in your composer.json file:

```json
{
    "require": {
        "nass600/snappy-service-provider": "1.0.0",
    }
}
```

or execute:

```bash
composer require "nass600/snappy-service-provider:1.0.0"
```

## Parameters ##

+ __snappy.pdf.binary:__ Absolute path to `wkhtmltopdf`.
+ __snappy.pdf.options:__ Array of options to give to Snappy (see [wkhtmltopdf doc](http://madalgo.au.dk/~jakobt/wkhtmltoxdoc/wkhtmltopdf_0.10.0_rc2-doc.html)).
+ __snappy.image.binary:__ Absolute path to `wkhtmltoimage`.
+ __snappy.image.options:__ Array of options to give to Snappy (see [wkhtmltoimage doc](http://madalgo.au.dk/~jakobt/wkhtmltoxdoc/wkhtmltoimage_0.10.0_rc2-doc.html)).

## Services ##

+ __snappy.pdf:__ Snappy service to create pdf.
+ __snappy.image:__ Snappy service to create image snapshots / thumbnails.


## Registering ##

```php
<?php

use Silex\Application;
use Nass600\Silex\Provider\SnappyServiceProvider;

$app = new Application();

$app->register(new SnappyServiceProvider(), array(
    'snappy.pdf.binary' => '/path/to/wkhtmltopdf',
    'snappy.pdf.options' => array(
        'footer-center' => 'page [page]'
    ),
    'snappy.image.binary' => '/path/to/wkhtmltoimage',
    'snappy.image.options' => array(
        'format' => 'png'
    )
));
```

## Usage ##

## License ##

[MIT](LICENSE)

## Credits ##

This is a simple Silex Provider to use this amazing tools:

+ [KnpLabs](https://github.com/KnpLabs/snappy): The snappy PHP5 library
+ [Wkhtmltopdf](https://github.com/wkhtmltopdf/wkhtmltopdf): The command line tools to render HTML into PDF

## Authors ##

+ [Ignacio Velazquez](http://ignaciovelazquez.es)