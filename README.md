# Bamboo API Client
PHP client for Bamboo API (6.1.1)

* [Bamboo API Client on Packagist](https://packagist.org/packages/steffenbrand/bamboo-api-client)
* [Bamboo API Client on GitHub](https://github.com/steffenbrand/bamboo-api-client)

## Limitations

Currently only supports the following methods:
- `/rest/api/latest/result/{key}` (getLatestResultByKey)
- `/rest/api/latest/plan` (getPlanList)

## How to install

```
composer require steffenbrand/bamboo-api-client
```

## How to use

### getLatestResultByKey

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

### getPlanList

```php
try {
    $client = new BambooClient(
        'http://bamboo.dev',
        'user',
        'pass'
    );
    
    $result = $client->getPlanList();
    
    if (count($result) > 0) {
        foreach ($result as $plan) {
            $plan->getKey();
            $plan->getName();
            $plan->getShortKey();
            $plan->getShortName();
            $plan->getLink()->getHref();
        }
    }
} catch (BambooRequestException $e) {
    // Request might fail
} catch (\RuntimeException $e) {
    // Something could go wrong during runtime
}
```
