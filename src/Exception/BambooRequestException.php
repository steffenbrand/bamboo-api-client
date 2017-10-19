<?php

namespace SteffenBrand\BambooApiClient\Exception;

/**
 * Class BambooRequestException
 * @package SteffenBrand\BambooApiClient\Exception
 */
class BambooRequestException extends \Exception
{
    /**
     * BambooRequestException constructor.
     *
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}