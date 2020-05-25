<?php

namespace Aptitus\Fairs\Domain\Model\Customers;

use Aptitus\Common\Domain\Model\Entity;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\CategoryCompany;

/**
 * Class Company
 *
 * @package Aptitus\Fairs\Domain\Model\Customers
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class Company extends Entity
{
    const ACTIVE = 1;
    const INACTIVE = 0;
    const MAX_LENGTH_TRADE_NAME = 100;
    const MAX_LENGTH_BUSINESS_NAME = 100;
    const MAX_LENGTH_IMAGE = 200;
    const MAX_LENGTH_INDUSTRY_NAME = 100;

    /**
     * @var string
     */
    private $ruc;

    /**
     * @var string
     */
    private $tradeName;

    /**
     * @var string
     */
    private $businessName;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $image;

    /**
     * @var int
     */
    private $state = self::ACTIVE;

    /**
     * @return float
     */
    private $latitude;

    /**
     * @return float
     */
    private $longitude;

    /**
     * @var string
     */
    private $category;

    /**
     * @return double
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        if ($latitude) {
            $this->float($latitude, "No es una latitud válida.");
        }

        $this->latitude = $latitude;
    }

    /**
     * @return double
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        if ($longitude) {
            $this->float($longitude, "No es una longitud válida.");
        }

        $this->longitude = $longitude;
    }

    public function getRuc(): string
    {
        return $this->ruc;
    }

    /**
     * @param string $ruc
     * @return Company
     */
    public function setRuc(string $ruc): Company
    {
        $this->notEmpty($ruc, 'Ruc no puede estar vacío');
        $this->length($ruc, 11, 'Ruc debe ser de 11 dígitos');
        $this->ruc = $ruc;

        return $this;
    }

    /**
     * @return string
     */
    public function getTradeName(): string
    {
        return $this->tradeName;
    }

    /**
     * @param string $tradeName
     * @return Company
     */
    public function setTradeName(string $tradeName): Company
    {
        $this->notEmpty($tradeName, 'La Razón Social no puede estar vacía');
        $this->maxLength($tradeName, self::MAX_LENGTH_TRADE_NAME, sprintf('La Razón Social debe tener máximo %s caracteres', self::MAX_LENGTH_TRADE_NAME));
        $this->tradeName = $tradeName;

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessName(): string
    {
        return $this->businessName;
    }

    /**
     * @param string $businessName
     * @return Company
     */
    public function setBusinessName(string $businessName): Company
    {
        $this->notEmpty($businessName, 'El Nombre Comercial no puede estar vacío');
        $this->maxLength($businessName, self::MAX_LENGTH_BUSINESS_NAME, sprintf('El Nombre Comercial debe tener máximo %s caracteres', self::MAX_LENGTH_BUSINESS_NAME));
        $this->businessName = $businessName;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Company
     */
    public function setImage(string $image): Company
    {
        $this->notEmpty($image, 'La Imagen no puede estar vacío');
        $this->maxLength($image, self::MAX_LENGTH_IMAGE, sprintf('La Imagen debe tener máximo %s caracteres', self::MAX_LENGTH_IMAGE));
        $this->image = $image;

        return $this;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return Company
     */
    public function setState(int $state): Company
    {
        $this->notEmpty($state, 'El Estado no puede estar vacío');
        $this->integer($state, 'El Estado debe ser entero');
        $this->state = $state;

        return $this;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

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
     * @return Company
     */
    public function setCategory($category)
    {
        $this->notEmpty($category, 'La categoría no puede estar vacío');
        $this->choice($category, CategoryCompany::getConstants(), 'La categoría solo puede ser Empleo o Educacion.');
        $this->category = $category;

        return $this;
    }
}
