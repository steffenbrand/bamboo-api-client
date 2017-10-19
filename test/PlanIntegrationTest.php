<?php

namespace WGG\CamundaClient\Test;

use PHPUnit\Framework\TestCase;
use SteffenBrand\BambooApiClient\Client\BambooClient;

/**
 * Class PlanIntegrationTest
 * @package WGG\CamundaClient\Test
 */
final class PlanIntegrationTest extends TestCase
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

    public function TestSomething()
    {
        $this->assertTrue(true);
    }
}