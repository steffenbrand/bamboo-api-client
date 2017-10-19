<?php

namespace SteffenBrand\BambooApiClient\Mapper;

/**
 * Interface MapperInterface
 * @package SteffenBrand\BambooApiClient\Mapper
 */
interface MapperInterface
{
    /**
     * @return mixed
     */
    public function map();

    /**
     * Returns a mapper instance.
     *
     * @param array $array
     * @param mixed $instance
     * @return mixed
     */
    public static function getMapperInstance(array $array, $instance);
}