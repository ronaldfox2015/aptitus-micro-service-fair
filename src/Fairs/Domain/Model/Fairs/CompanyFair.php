<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;
use Aptitus\Fairs\Domain\Model\Customers\Company;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\CategoryCompany;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\OfferType;

/**
 * Class CompanyFair
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanyFair extends Entity
{
    const ACTIVE = 1;
    const INACTIVE = 0;

    /**
     * @var Company
     */
    private $company;

    /**
     * @var Fair
     */
    private $fair;

    /**
     * @var string
     */
    private $category;

    /**
     * @var int
     */
    private $industryId;

    /**
     * @var string
     */
    private $industryName;

    /**
     * @var int
     */
    private $state = self::ACTIVE;

    /**
     * @var string
     */
    private $mapping;

    /**
     * @var string
     */
    private $mappingTablet;

    /**
     * @var string
     */
    private $offerType;

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     * @return CompanyFair
     */
    public function setCompany($company)
    {
        $this->notEmpty($company->getId(), 'El id de la compañía no puede estar vacío');
        $this->company = $company;
        return $this;
    }

    /**
     * @return Fair
     */
    public function getFair()
    {
        return $this->fair;
    }

    /**
     * @param Fair $fair
     * @return CompanyFair
     */
    public function setFair($fair)
    {
        $this->notEmpty($fair->getId(), 'EL id de la feria no puede estar vacío');
        $this->fair = $fair;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     * @return CompanyFair
     */
    public function setCategory($category)
    {
        $this->notEmpty($category, 'La categoría no puede estar vacío');
        $this->choice($category, CategoryCompany::getConstants(), 'La categoría solo puede ser Empleo o Educacion.');
        $this->category = $category;

        return $this;
    }

    /**
     * @return int
     */
    public function getIndustryId()
    {
        return $this->industryId;
    }

    /**
     * @param int $industryId
     * @return CompanyFair
     */
    public function setIndustryId($industryId)
    {
        $this->industryId = $industryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getIndustryName()
    {
        return $this->industryName;
    }

    /**
     * @param string $industryName
     * @return CompanyFair
     */
    public function setIndustryName($industryName)
    {
        $this->industryName = $industryName;
        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return CompanyFair
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * @param string $mapping
     * @return CompanyFair
     */
    public function setMapping($mapping)
    {
        $this->mapping = $mapping;
        return $this;
    }

    /**
     * @return string
     */
    public function getMappingTablet()
    {
        return $this->mappingTablet;
    }

    /**
     * @param string $mappingTablet
     * @return CompanyFair
     */
    public function setMappingTablet($mappingTablet)
    {
        $this->mappingTablet = $mappingTablet;
        return $this;
    }

    /**
     * @return string
     */
    public function getOfferType()
    {
        return $this->offerType;
    }

    /**
     * @param string $offerType
     * @return CompanyFair
     */
    public function setOfferType($offerType)
    {
        if ($this->getCategory()==CategoryCompany::EDUCATION) {
            $this->choice($offerType, OfferType::getConstants(), 'El tipo de oferta solo puede ser Curso, Pregrado o Postgrado');
        }
        $this->offerType = $offerType;

        return $this;
    }
}
