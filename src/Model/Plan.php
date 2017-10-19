<?php

namespace SteffenBrand\BambooApiClient\Model;

/**
 * Class Plan
 * @package SteffenBrand\BambooApiClient\Model
 */
class Plan
{
    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $shortKey;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $name;

    /**
     * @var Link
     */
    private $link;

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     */
    public function setShortName(string $shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * @return string
     */
    public function getShortKey(): string
    {
        return $this->shortKey;
    }

    /**
     * @param string $shortKey
     */
    public function setShortKey(string $shortKey)
    {
        $this->shortKey = $shortKey;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
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