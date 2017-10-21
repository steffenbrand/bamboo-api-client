<?php

namespace SteffenBrand\BambooApiClient\Model;

/**
 * Class Link
 * @package SteffenBrand\BambooApiClient\Model
 */
class Link implements \JsonSerializable
{
    /**
     * @var string
     */
    private $href;

    /**
     * @var string
     */
    private $rel;

    /**
     * @return string
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref(string $href)
    {
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getRel(): string
    {
        return $this->rel;
    }

    /**
     * @param string $rel
     */
    public function setRel(string $rel)
    {
        $this->rel = $rel;
    }

    public function jsonSerialize()
    {
        return [
            'href' => $this->href,
            'rel' => $this->rel
        ];
    }
}