<?php

namespace Aptitus\Fairs\Application\Fairs\Company\Data;

use Aptitus\Common\Adapter\Input\AbstractInput;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\OfferType;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Aptitus\Common\Assertion;

/**
 * Class CompanyInput
 *
 * @package Aptitus\Fairs\Application\Fairs\Company\Data
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 *
 * @method string documentNumber()
 * @method string tradeName()
 * @method string businessName()
 * @method string slug()
 * @method string logo()
 * @method string category()
 * @method int industryId()
 * @method string industryName()
 * @method array stand()
 * @method array profile()
 * @method array socialMedia()
 * @method array imageGallery()
 * @method array document()
 * @method int fairId()
 * @method int companyId()
 * @method string oldCategory()
 * @method double latitude()
 * @method double longitude()
 * @method string desktopCoordinates()
 * @method string tabletCoordinates()
 * @method string offerType()
 */
class CompanyInput extends AbstractInput
{
    protected $documentNumber;
    protected $tradeName;
    protected $businessName;
    protected $slug;
    protected $logo;
    protected $category;
    protected $industryId;
    protected $industryName;
    protected $stand;
    protected $profile;
    protected $socialMedia;
    protected $imageGallery;
    protected $document;
    protected $fairId;
    protected $companyId;
    protected $oldCategory;
    protected $latitude;
    protected $longitude;
    protected $offerType;

    /** @var string $desktopCoordinates */
    protected $desktopCoordinates;

    /** @var string $tabletCoordinates */
    protected $tabletCoordinates;

    /**
     * CompanyInput constructor.
     * @param $documentNumber
     * @param $tradeName
     * @param $businessName
     * @param $slug
     * @param $logo
     * @param $category
     * @param $industryId
     * @param $industryName
     * @param $stand
     * @param $profile
     * @param $socialMedia
     * @param $imageGallery
     * @param $document
     * @param $latitude
     * @param $longitude
     * @param $coords
     * @param $offerType
     * @param $fairId
     * @param int $companyId
     * @param string $oldCategory
     */
    public function __construct(
        $documentNumber,
        $tradeName,
        $businessName,
        $slug,
        $logo,
        $category,
        $industryId,
        $industryName,
        $stand,
        $profile,
        $socialMedia,
        $imageGallery,
        $document,
        $latitude,
        $longitude,
        $coords,
        $offerType,
        $fairId,
        $companyId = 0,
        $oldCategory = ''
    ) {
        $this->documentNumber = $this->isRequired($documentNumber, 'número de documento');
        $this->tradeName = $this->isRequired($tradeName, 'nombre comercial');
        $this->businessName = $this->isRequired($businessName, 'razon social');
        $this->slug = $this->isRequired($slug, 'slug');
        $this->logo = $this->isRequired($logo,'logo');
        $this->category = $this->isRequired($category, 'categoria');
        $this->industryId = $this->isRequired($industryId, 'industria id');
        $this->industryName = $this->isRequired($industryName, 'industria nombre');
        $this->stand = $stand;
        $this->profile = $profile;
        $this->socialMedia = $socialMedia;
        $this->imageGallery = $imageGallery;
        $this->document = $document;
        $this->fairId = $this->isRequired($fairId, 'feria id');
        $this->companyId = $companyId;
        $this->oldCategory = $oldCategory;
        $this->isDependent($latitude, $longitude);
        $this->latitude = $this->isEmpty($latitude) ? null : (double) $latitude;
        $this->longitude = $this->isEmpty($longitude) ? null : (double) $longitude;
        $this->desktopCoordinates = isset($coords['desktop']) ? $coords['desktop'] : '';
        $this->tabletCoordinates = isset($coords['tablet']) ? $coords['tablet'] : '';
        $this->offerType = $offerType;
        $this->validate();
    }

    /**
     * @param $input
     * @param $type
     * @return mixed
     */
    private function isRequired($input, $type)
    {
        if (empty($input)) {
            throw new BadRequestHttpException(sprintf('El campo %s es requerido', $type));
        }
        return $input;
    }

    private function isRequiredArray($input)
    {
        if (is_array($input)){
            foreach ($input as $key => $value){
                if(!is_array($value) && empty($value)){
                    throw new BadRequestHttpException(sprintf('El campo %s es requerido', $key));
                }
                if(is_array($value)){
                    $this->isRequiredArray($value);
                }
            }
        }
    }

    private function isDependent($latitude, $longitude)
    {
        if ((!$this->isEmpty($latitude) && $this->isEmpty($longitude)) || ($this->isEmpty($latitude) && !$this->isEmpty($longitude))) {
            throw new BadRequestHttpException('La latitud y la longitud deben llenarse al mismo tiempo.');
        }
    }

    private function isEmpty($value)
    {
        return ($value === null || $value === "");
    }

    private function validate()
    {
        Assertion::nullOrString($this->desktopCoordinates, 'Las coordenadas del escritorio no son válidas.');
        Assertion::nullOrString($this->tabletCoordinates, 'Las coordenadas modo tablet no son válidas.');
        Assertion::nullOrInArray($this->offerType, OfferType::getConstants(), 'El tipo de oferta solo puede ser Curso, Pregrado o Postgrado');
    }
}
