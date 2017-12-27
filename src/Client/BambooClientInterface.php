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
     * BambooClient constructor.
     *
     * @param string $baseUrl
     * @param string $username
     * @param string $password
     * @param float $timeout
     */
    public function __construct(string $baseUrl, string $username, string $password, float $timeout);

    /**
     * Get latest result by key.
     *
     * @param string $key
     * @return Result
     */
    public function getLatestResultByKey(string $key): Result;

    /**
     * Get a list of all plans
     *
     * @return array
     */
    public function getPlanList(): array;

    /**
     * Get Bamboo plans paginated with maxResults and startIndex parameters.
     *
     * @param integer $startIndex
     * @param integer $maxResults
     * @return array
     */
    public function getPlans($startIndex = 0, $maxResults = 25): array;
}
