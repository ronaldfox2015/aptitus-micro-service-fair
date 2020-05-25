<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class Profile
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class Profile extends Entity
{
    /**
     * @var CompanyFair
     */
    private $companyFair;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $description;

    /**
     * @return CompanyFair
     */
    public function getCompanyFair(): CompanyFair
    {
        return $this->companyFair;
    }

    /**
     * @param CompanyFair $companyFair
     * @return Profile
     */
    public function setCompanyFair(CompanyFair $companyFair): Profile
    {
        $this->companyFair = $companyFair;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Profile
     */
    public function setLabel(string $label): Profile
    {
        $this->notEmpty($label, 'La etiqueta no debe estar vacía');
        $this->label = $label;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Profile
     */
    public function setDescription(string $description): Profile
    {
        $this->description = $description;

        if (! empty($this->label)) {
            $this->notEmpty($description, 'La descripción no debe estar vacía');
        }

        return $this;
    }
}
