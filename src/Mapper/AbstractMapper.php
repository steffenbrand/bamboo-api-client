<?php

namespace SteffenBrand\BambooApiClient\Mapper;

/**
 * Class AbstractMapper
 * @package SteffenBrand\BambooApiClient\Mapper
 */
abstract class AbstractMapper implements MapperInterface
{
    /**
     * @var array
     */
    protected $array;

    /**
     * @var mixed
     */
    protected $instance;

    /**
     * Gets value from array with validation.
     *
     * @param string $key
     * @return mixed
     * @throws \RuntimeException
     */
    protected function getArrayValue($key)
    {
        if (false === is_array($this->array) || false === array_key_exists($key, $this->array)) {
            throw new \RuntimeException(sprintf('Mapping of array key %s failed.', $key));
        }

        return $this->array[$key];
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * @param array $array
     */
    public function setArray(array $array)
    {
        $this->array = $array;
    }

    /**
     * @return mixed
     */
    public function getInstance()
    {
        return $this->instance;
    }

    /**
     * @param mixed $instance
     */
    public function setInstance($instance)
    {
        $this->instance = $instance;
    }

}