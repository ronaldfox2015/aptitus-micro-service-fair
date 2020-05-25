<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class SocialMedia
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class SocialMedia extends Entity
{
    /**
     * @var CompanyFair
     */
    private $companyFair;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $type;

    /**
     * @return CompanyFair
     */
    public function getCompanyFair(): CompanyFair
    {
        return $this->companyFair;
    }

    /**
     * @param CompanyFair $companyFair
     * @return SocialMedia
     */
    public function setCompanyFair(CompanyFair $companyFair): SocialMedia
    {
        $this->companyFair = $companyFair;

        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return SocialMedia
     */
    public function setLink(string $link): SocialMedia
    {
        $this->notEmpty($link, 'El enlace no debe estar vacío');
        $this->url($link, 'El formato del enlace no es válido');
        $this->link = $link;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return SocialMedia
     */
    public function setType(string $type): SocialMedia
    {
        $this->notEmpty($type, 'El tipo no debe estar vacío');
        $this->choice($type, SocialMediaType::getConstants(), sprintf('No es una opción válida: [%s]', implode(SocialMediaType::getConstants(), ', ')));
        $this->type = $type;

        return $this;
    }
}
