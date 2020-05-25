<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class ImageGallery
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class ImageGallery extends Entity
{
    const MAX_LENGTH_NAME = 100;

    /**
     * @var string
     */
    private $name;

    /**
     * @var CompanyFair
     */
    private $companyFair;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ImageGallery
     */
    public function setName(string $name): ImageGallery
    {
        $this->notEmpty($name, 'El Nombre de la Imagen de la Galería no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre de la Imagen de la Galería debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
        $this->name = $name;

        return $this;
    }

    /**
     * @return CompanyFair
     */
    public function getCompanyFair(): CompanyFair
    {
        return $this->companyFair;
    }

    /**
     * @param CompanyFair $companyFair
     * @return ImageGallery
     */
    public function setCompanyFair(CompanyFair $companyFair): ImageGallery
    {
        $this->companyFair = $companyFair;

        return $this;
    }
}
