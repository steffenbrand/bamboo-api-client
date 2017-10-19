<?php

namespace SteffenBrand\BambooApiClient\Test;

use PHPUnit\Framework\TestCase;
use SteffenBrand\BambooApiClient\Client\BambooClient;

/**
 * Class LatestResultIntegrationTest
 * @package WGG\CamundaClient\Test
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
        $this->assertNotNull($result);
    }
}