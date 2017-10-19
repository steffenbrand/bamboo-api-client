<?php

namespace SteffenBrand\BambooApiClient\Mapper;

use SteffenBrand\BambooApiClient\Model\Link;
use SteffenBrand\BambooApiClient\Model\Plan;

/**
 * Class VariableMapper
 * @package WGG\CamundaClient\Mapper
 */
class PlanMapper extends AbstractMapper
{
    /**
     * PlanMapper constructor.
     *
     * @param $array
     * @param $instance
     */
    private function __construct(array $array, Plan $instance)
    {
        $this->array = $array;
        $this->instance = $instance;
    }

    /**
     * @return Plan
     * @throws \RuntimeException
     */
    public function map(): Plan
    {
        $this->instance->setKey($this->getArrayValue('key'));
        $this->instance->setName($this->getArrayValue('name'));
        $this->instance->setShortKey($this->getArrayValue('shortKey'));
        $this->instance->setShortName($this->getArrayValue('shortName'));
        $this->instance->setLink(
            LinkMapper::getMapperInstance($this->getArrayValue('link'),
                new Link()
            )->map()
        );

        return $this->instance;
    }

    /**
     * Returns a VariableMapper instance.
     *
     * @param array $array
     * @param Plan $instance
     * @return PlanMapper
     */
    public static function getMapperInstance(array $array, $instance): PlanMapper
    {
        return new self($array, $instance);
    }

}