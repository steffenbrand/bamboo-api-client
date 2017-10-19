<?php

namespace SteffenBrand\BambooApiClient\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use SteffenBrand\BambooApiClient\Exception\BambooRequestException;

/**
 * Class AbstractBambooClient
 * @package SteffenBrand\BambooApiClient\Client
 */
abstract class AbstractBambooClient implements BambooClientInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * AbstractClient constructor.
     *
     * @param string $baseUrl
     * @param string $username
     * @param string $password
     * @param float $timeout
     */
    public function __construct(string $baseUrl, string $username, string $password, float $timeout)
    {
        $this->client = new Client(
            [
                'base_uri' => $baseUrl,
                'timeout' => $timeout,
                'auth' => [$username, $password, 'Basic']
            ]
        );
    }

    /**
     * Perform GET request to TAC Service.
     *
     * @param string $path The absolute request path with leading "/"
     * @param array $query A list of query parameters
     * @return ResponseInterface
     * @throws BambooRequestException|\RuntimeException
     */
    protected function get(string $path, $query = []): ResponseInterface
    {
        $response = null;

        try {
            $response = $this->client->request(
                'GET',
                $path,
                [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ],
                    'query' => $query
                ]
            );
        } catch (RequestException $e) {
            $this->throwRequestException('Request to Bamboo failed.', $e->getResponse(), $e->getMessage());
        } catch (\RuntimeException $e) {
            $this->throwRequestException('Request to Bamboo failed.', null, $e->getMessage());
        }

        return $response;
    }

    /**
     * Throws an Exception including information about the response.
     *
     * @param string $customMessage
     * @param ResponseInterface $response
     * @param string $originalMessage
     * @throws BambooRequestException|\RuntimeException
     */
    protected function throwRequestException($customMessage, $response = null, $originalMessage = null)
    {
        $responseInfo = '';

        if (null !== $response) {
            $responseInfo = sprintf(
                ' | Response Status Code: %s | Response Body: %s',
                (string) $response->getStatusCode(),
                (string) $response->getBody()->getContents()
            );
        }

        if (null !== $originalMessage) {
            $originalMessage = sprintf(
                ' | Original Message: %s',
                (string) $originalMessage
            );
        }

        throw new BambooRequestException($customMessage . $responseInfo . $originalMessage);
    }
}