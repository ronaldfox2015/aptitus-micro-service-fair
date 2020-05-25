<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class Document
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class Document extends Entity
{
    const MAX_LENGTH_NAME = 100;
    const MAX_LENGTH_TITLE = 100;

    /**
     * @var CompanyFair
     */
    private $companyFair;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $title;

    /**
     * @return CompanyFair
     */
    public function getCompanyFair(): CompanyFair
    {
        return $this->companyFair;
    }

    /**
     * @param CompanyFair $companyFair
     * @return Document
     */
    public function setCompanyFair(CompanyFair $companyFair): Document
    {
        $this->companyFair = $companyFair;

        return $this;
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
     * @return Document
     */
    public function setName(string $name): Document
    {
        $this->notEmpty($name, 'El Nombre del Documento no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre del Documento debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Document
     */
    public function setTitle(string $title): Document
    {
        $this->notEmpty($title, 'El Título del Documento no puede estar vacío');
        $this->maxLength($title, self::MAX_LENGTH_TITLE, sprintf('El Título del Documento debe tener máximo %s caracteres', self::MAX_LENGTH_TITLE));
        $this->title = $title;

        return $this;
    }
}
