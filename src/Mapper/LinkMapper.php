<?php

namespace SteffenBrand\BambooApiClient\Mapper;

use SteffenBrand\BambooApiClient\Model\Link;

/**
 * Class LinkMapper
 * @package SteffenBrand\BambooApiClient\Mapper
 */
class LinkMapper extends AbstractMapper
{
    /**
     * ResultMapper constructor.
     *
     * @param $array
     * @param $instance
     */
    private function __construct(array $array, Link $instance)
    {
        $this->array = $array;
        $this->instance = $instance;
    }

    /**
     * @return Link
     * @throws \RuntimeException
     */
    public function map(): Link
    {
        $this->instance->setHref($this->getArrayValue('href'));
        $this->instance->setRel($this->getArrayValue('rel'));

        return $this->instance;
    }

    /**
     * Returns a VariableMapper instance.
     *
     * @param array $array
     * @param Link $instance
     * @return LinkMapper
     */
    public static function getMapperInstance(array $array, $instance): LinkMapper
    {
        return new self($array, $instance);
    }

}