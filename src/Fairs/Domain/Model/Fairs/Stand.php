<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class Stand
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class Stand extends Entity
{
    /**
     * @var StandType
     */
    private $standType;

    /**
     * @var StandModel
     */
    private $standModel;

    /**
     * @var CompanyFair
     */
    private $companyFair;

    /**
     * @var StandAmphitryon
     */
    private $standAmphitryon;

    /**
     * @return StandType
     */
    public function getStandType()
    {
        return $this->standType;
    }

    /**
     * @param StandType $standType
     * @return Stand
     */
    public function setStandType($standType)
    {
        $this->standType = $standType;
        return $this;
    }

    /**
     * @return StandModel
     */
    public function getStandModel()
    {
        return $this->standModel;
    }

    /**
     * @param StandModel $standModel
     * @return Stand
     */
    public function setStandModel($standModel)
    {
        $this->standModel = $standModel;
        return $this;
    }

    /**
     * @return CompanyFair
     */
    public function getCompanyFair()
    {
        return $this->companyFair;
    }

    /**
     * @param CompanyFair $companyFair
     * @return Stand
     */
    public function setCompanyFair($companyFair)
    {
        $this->companyFair = $companyFair;
        return $this;
    }

    /**
     * @return StandAmphitryon
     */
    public function getStandAmphitryon()
    {
        return $this->standAmphitryon;
    }

    /**
     * @param StandAmphitryon $standAmphitryon
     * @return Stand
     */
    public function setStandAmphitryon($standAmphitryon)
    {
        $this->standAmphitryon = $standAmphitryon;
        return $this;
    }
}
