<?php

namespace Aptitus\Fairs\Application\Fairs\Sponsor\Data;

use Aptitus\Common\Adapter\Input\AbstractInput;
use Aptitus\Common\Assertion;
use Aptitus\Fairs\Domain\Model\Customers\Category;
use Assert\AssertionFailedException;

/**
 * Class SponsorInput
 *
 * @package Aptitus\Fairs\Application\Fairs\Sponsor\Data
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 *
 * @method string companyName()
 * @method string image()
 * @method string url()
 * @method string desktopCoordinates()
 * @method string tabletCoordinates()
 * @method string category()
 */
class SponsorInput extends AbstractInput
{
    /** @var string $companyName */
    protected $companyName;

    /** @var string $image */
    protected $image;

    /** @var string $url */
    protected $url;

    /** @var string $desktopCoordinates */
    protected $desktopCoordinates;

    /** @var string $tabletCoordinates */
    protected $tabletCoordinates;

    /** @var string $category */
    protected $category;

    /**
     * SponsorInput constructor.
     * @param $companyName
     * @param $image
     * @param $url
     * @param array $coords
     * @param $category
     * @throws AssertionFailedException
     */
    public function __construct($companyName, $image, $url, $coords, $category)
    {
        $this->companyName = $companyName;
        $this->image = $image;
        $this->url = $url;
        $this->desktopCoordinates = isset($coords['desktop']) ? $coords['desktop'] : '';
        $this->tabletCoordinates = isset($coords['tablet']) ? $coords['tablet'] : '';
        $this->category = $category;
        $this->validate();
    }

    /**
     * @throws AssertionFailedException
     */
    private function validate()
    {
        Assertion::string($this->companyName, 'El nombre de la empresa no es válido.');
        Assertion::notEmpty($this->companyName, 'El nombre de la empresa es requerido.');
        Assertion::string($this->image, 'El nombre de la imagen no es válida.');
        Assertion::notEmpty($this->image, 'El nombre de la imagen es requerida.');
        Assertion::string($this->url, 'La url no es válida.');
        Assertion::url($this->url, 'La url no es válida.');
        Assertion::notEmpty($this->url, 'La url es requerida');
        Assertion::nullOrString($this->desktopCoordinates, 'Las coordenadas del escritorio no son válidas.');
        Assertion::nullOrString($this->tabletCoordinates, 'Las coordenadas modo tablet no son válidas.');
        Assertion::inArray($this->category, Category::getConstants(), 'La categoría no es válida.');
    }
}