<?php

namespace SteffenBrand\BambooApiClient\Client;

use SteffenBrand\BambooApiClient\Exception\BambooRequestException;
use SteffenBrand\BambooApiClient\Mapper\PlanMapper;
use SteffenBrand\BambooApiClient\Mapper\ResultMapper;
use SteffenBrand\BambooApiClient\Model\Plan;
use SteffenBrand\BambooApiClient\Model\Result;

/**
 * Class BambooClient
 * @package SteffenBrand\BambooApiClient\Client
 */
class BambooClient extends AbstractBambooClient
{
    /**
     * BambooClient constructor.
     *
     * @param string $baseUrl
     * @param string $username
     * @param string $password
     * @param float $timeout
     */
    public function __construct(string $baseUrl, string $username, string $password, float $timeout = 10.0)
    {
        parent::__construct($baseUrl, $username, $password, $timeout);
    }

    /**
     * Get latest result by key.
     *
     * @param string $key
     * @return Result
     * @throws BambooRequestException|\RuntimeException
     */
    public function getLatestResultByKey(string $key): Result
    {
        if (false === is_string($key) || 0 === strlen($key)) {
            throw new BambooRequestException('Plans key must be provided.');
        }

        $response = $this->get('/rest/api/latest/result/' . $key . '.json', ['max-results' => 1]);

        if (200 !== (int) $response->getStatusCode()) {
            $this->throwRequestException(sprintf('Result for latest run of %s could not be requested.', $key), $response);
        }

        $responseData = json_decode($response->getBody()->getContents(), true);
        if (false === isset($responseData['results']['result'][0])) {
            $this->throwRequestException('Empty result list.', $response);
        }

        $result = ResultMapper::getMapperInstance($responseData['results']['result'][0], new Result())->map();

        return $result;
    }

    /**
     * Get a list of all plans.
     *
     * @param integer $maxresult
     * @return Plan[]
     */
    public function getPlanList($maxresult = 25): array
    {
        $response = $this->get('/rest/api/latest/plan.json', ['max-results' => $maxresult]);

        if (200 !== (int) $response->getStatusCode()) {
            $this->throwRequestException('List of plans could not be requested.', $response);
        }

        $responseData = json_decode($response->getBody()->getContents(), true);

        if (false === isset($responseData['plans']['size']) || $responseData['plans']['size'] < 1) {
            return [];
        }

        $result = [];

        foreach ($responseData['plans']['plan'] as $plan) {
            $result[] = PlanMapper::getMapperInstance($plan, new Plan())->map();
        }

        return $result;
    }
}
