<?php

namespace SteffenBrand\BambooApiClient\Mapper;

use SteffenBrand\BambooApiClient\Model\Link;
use SteffenBrand\BambooApiClient\Model\Plan;
use SteffenBrand\BambooApiClient\Model\Result;

/**
 * Class VariableMapper
 * @package WGG\CamundaClient\Mapper
 */
class ResultMapper extends AbstractMapper
{
    /**
     * ResultMapper constructor.
     *
     * @param $array
     * @param $instance
     */
    private function __construct(array $array, Result $instance)
    {
        $this->array = $array;
        $this->instance = $instance;
    }

    /**
     * @return Result
     * @throws \RuntimeException
     */
    public function map(): Result
    {
        $this->instance->setNumber($this->getArrayValue('number'));
        $this->instance->setState($this->getArrayValue('state'));
        $this->instance->setPlan(
            PlanMapper::getMapperInstance($this->getArrayValue('plan'),
                new Plan()
            )->map()
        );
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
     * @param Result $instance
     * @return ResultMapper
     */
    public static function getMapperInstance(array $array, $instance): ResultMapper
    {
        return new self($array, $instance);
    }

}