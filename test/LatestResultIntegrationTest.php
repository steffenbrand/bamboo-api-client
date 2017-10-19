<?php

namespace SteffenBrand\BambooApiClient\Test;

use PHPUnit\Framework\TestCase;
use SteffenBrand\BambooApiClient\Client\BambooClient;

/**
 * Class LatestResultIntegrationTest
 * @package SteffenBrand\BambooApiClient\Test
 */
class LatestResultIntegrationTest extends TestCase
{
    /**
     * @var BambooClient
     */
    public $client;

    public function setUp()
    {
        $this->client = new BambooClient(
            'http://bamboo.dev',
            'user',
            'pass'
        );
    }

    public function testGetLatestResultByKey()
    {
        $result = $this->client->getLatestResultByKey('MY-PLAN');

        $result->getNumber();
        $result->getState();
        $result->getLink()->getHref();
        $result->getPlan()->getKey();
        $result->getPlan()->getName();
        $result->getPlan()->getShortKey();
        $result->getPlan()->getShortName();
        $result->getPlan()->getLink()->getHref();

        $this->assertNotNull($result);
    }
}