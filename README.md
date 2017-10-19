# Bamboo API Client
PHP client for Bamboo API (6.1.1)

* [Bamboo API Client on Packagist](https://packagist.org/packages/steffenbrand/bamboo-api-client)
* [Bamboo API Client on GitHub](https://github.com/steffenbrand/bamboo-api-client)

## Limitations

- Currently only supports `/rest/api/latest/result/{key}` request

## How to install

```
composer require steffenbrand/bamboo-api-client
```

## How to use

```php
try {
    $client = new BambooClient(
        'http://bamboo.dev',
        'user',
        'pass'
    );
    
    $result = $client->getLatestResultByKey('MYPLAN-KEY');
    
    $result->getNumber();
    $result->getState();
    $result->getLink()->getHref();
    $result->getPlan()->getKey();
    $result->getPlan()->getName();
    $result->getPlan()->getShortKey();
    $result->getPlan()->getShortName();
    $result->getPlan()->getLink()->getHref();
} catch (BambooRequestException $e) {
    // Request might fail
} catch (\RuntimeException $e) {
    // Something could go wrong during runtime
}
```
