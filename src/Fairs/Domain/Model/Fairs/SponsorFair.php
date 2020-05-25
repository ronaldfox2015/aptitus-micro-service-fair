<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class SponsorFair
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
class SponsorFair extends Entity
{
    /**
     * @var
     */
    protected $category;
    protected $state;
    protected $mapping;
    protected $mappingTablet;
    protected $sponsor;
    protected $fair;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * @param mixed $mapping
     */
    public function setMapping($mapping)
    {
        $this->mapping = $mapping;
    }

    /**
     * @return mixed
     */
    public function getMappingTablet()
    {
        return $this->mappingTablet;
    }

    /**
     * @param mixed $mappingTablet
     */
    public function setMappingTablet($mappingTablet)
    {
        $this->mappingTablet = $mappingTablet;
    }

    /**
     * @return mixed
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }

    /**
     * @param Sponsor $sponsor
     */
    public function setSponsor($sponsor)
    {
        $this->sponsor = $sponsor;
    }

    /**
     * @return mixed
     */
    public function getFair()
    {
        return $this->fair;
    }

    /**
     * @param mixed $fair
     */
    public function setFair($fair)
    {
        $this->fair = $fair;
    }
}