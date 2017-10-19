# Bamboo API Client
PHP client for Bamboo API (6.1.1)

* [DMN Decision Tables on Packagist](https://packagist.org/packages/steffenbrand/bamboo-api-client)
* [DMN Decision Tables on GitHub](https://github.com/steffenbrand/bamboo-api-client)

## Limitations

- Currently only supports `/rest/api/latest/result/{key}` request

## How to install

```
composer require steffenbrand/bamboo-api-client
```

## How to use

These examples show how to use the client.

### Build decision table

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
