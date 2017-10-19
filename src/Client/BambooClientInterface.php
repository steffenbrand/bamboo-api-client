<?php

namespace SteffenBrand\BambooApiClient\Client;

use SteffenBrand\BambooApiClient\Model\Result;

/**
 * Interface BambooClientInterface
 * @package SteffenBrand\BambooApiClient\Client
 */
interface BambooClientInterface
{
    /**
     * Get latest result by key.
     *
     * @param string $key
     * @return Result
     */
    public function getLatestResultByKey(string $key): Result;
}