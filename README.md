# 2Gis API Library

**Version 1.1.1**

## Overview

This library is designed to simplify the development of applications which use 2Gis by leveraging strict typing and other improvements. \
It allows developers to create highly modular and maintainable bots by defining handlers for various updates in a clear and structured manner.

## Contacts

If you received a bug or have an idea, please, write to [Gostev71@outlook.com](mailto:Gostev71@outlook.com)
and type `2Gis Library Bug` or `2Gis Library Idea` in email header.

## Features

- **Strict Typing:** Ensures type safety and better code completion, reducing the likelihood of runtime errors.
- **Ease of Use:** Designed with simplicity in mind, allowing you to focus on your bot's functionality rather than boilerplate code.

## Installation

To install the library, use Composer:

```sh
composer require andrew-gos/double-gis
```

## Usage

1. Get library instance
    ```php
    <?php

    use AndrewGos\DoubleGis\DoubleGisFactory;
    use AndrewGos\DoubleGis\ValueObject\AuthToken;

    $doubleGis = DoubleGisFactory::getDefault(new AuthToken('123456-7890-abcd-ef12-34567890abcd'));
    ```
2. Get api
    ```php
    <?php

    use AndrewGos\DoubleGis\DoubleGisFactory;
    use AndrewGos\DoubleGis\ValueObject\AuthToken;

    $doubleGis = DoubleGisFactory::getDefault(new AuthToken('123456-7890-abcd-ef12-34567890abcd'));
    $api = $doubleGis->getApi();
    ```
3. Use api
    ```php
    <?php

    use AndrewGos\DoubleGis\DoubleGisFactory;
    use AndrewGos\DoubleGis\ValueObject\AuthToken;
    use AndrewGos\DoubleGis\Request\RegionGetRequest;
    use AndrewGos\DoubleGis\Entity\Region;

    $doubleGis = DoubleGisFactory::getDefault(new AuthToken('123456-7890-abcd-ef12-34567890abcd'));
    $api = $doubleGis->getApi();
    $regionResponse = $api->regionGet(new RegionGetRequest('1'));
    /** @var Region[] $regions */
    $regions = $regionResponse->getResult()?->getItems();
    ```
4. Specify logger for library
    ```php
    <?php

    use AndrewGos\DoubleGis\DoubleGisFactory;
    use AndrewGos\DoubleGis\ValueObject\AuthToken;

    $doubleGis = DoubleGisFactory::getDefault(new AuthToken('123456-7890-abcd-ef12-34567890abcd'));
    $doubleGis->setLogger(new MyLogger());
    ```

## Usage as service in Symfony

If you use Symfony, and you want to create [DoubleGis](src/DoubleGis.php) object like service, type:
```yaml
# services.yaml
services:
  andrew-gos.double-gis.token:
     class: AndrewGos\DoubleGis\ValueObject\AuthToken
     arguments:
        $token: '%env(YOUR_TOKEN_ENV_PARAM)%'
        # Or if you don`t use .env
        # $token: 'YOUR_TOKEN'

  AndrewGos\DoubleGis\DoubleGis:
     factory: ['AndrewGos\DoubleGis\DoubleGisFactory', 'getDefault']
     arguments:
        $token: '@andrew-gos.double-gis.token'

     # If you want to set custom loggers
     calls:
        - setLogger: ['@logger']
```

## Usage in Yii2

If you use Yii2, you can use this library with Yii2 DI:
```php
// IN main.php OR web.php
// your config:
[
    'container' => [
        'definitions' => [
            \AndrewGos\DoubleGis\DoubleGis::class => function () {
                return \AndrewGos\DoubleGis\DoubleGisFactory::getDefault(
                    new \AndrewGos\DoubleGis\ValueObject\AuthToken('YOUR_TOKEN');
                ),
            },
        ],
    ],
];
```