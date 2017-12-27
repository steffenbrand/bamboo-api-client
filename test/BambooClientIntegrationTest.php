<?php

namespace SteffenBrand\BambooApiClient\Test;

use PHPUnit\Framework\TestCase;
use SteffenBrand\BambooApiClient\Client\BambooClient;
use SteffenBrand\BambooApiClient\Model\Plan;
use SteffenBrand\BambooApiClient\Model\Result;

/**
 * Class BambooClientIntegrationTest
 * @package SteffenBrand\BambooApiClient\Test
 */
class BambooClientIntegrationTest extends TestCase
{
    /**
     * @var BambooClient
     */
    public $client;

    public function setUp()
    {
        $this->client = new BambooClient(
            'x',
            'y',
            'z'
        );
    }

    public function testGetLatestResultByKey()
    {
        $result = $this->client->getLatestResultByKey('MY-PLAN');

        $this->assertNotNull($result);
        $this->assertInstanceOf(Result::class, $result);
    }

    public function testGetAllPlans()
    {
        $result = $this->client->getPlanList();

        $this->assertNotNull($result);
        $this->assertNotEmpty($result);
        $this->assertContainsOnly(Plan::class, $result);
    }
}