<?php

namespace SteffenBrand\BambooApiClient\Model;

/**
 * Class Result
 * @package SteffenBrand\BambooApiClient\Model
 */
class Result
{
    /**
     * @var Plan
     */
    private $plan;

    /**
     * @var int
     */
    private $number;

    /**
     * @var string
     */
    private $state;

    /**
     * @var Link
     */
    private $link;

    /**
     * @return Plan
     */
    public function getPlan(): Plan
    {
        return $this->plan;
    }

    /**
     * @param Plan $plan
     */
    public function setPlan(Plan $plan)
    {
        $this->plan = $plan;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber(int $number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state)
    {
        $this->state = $state;
    }

    /**
     * @return Link
     */
    public function getLink(): Link
    {
        return $this->link;
    }

    /**
     * @param Link $link
     */
    public function setLink(Link $link)
    {
        $this->link = $link;
    }
}