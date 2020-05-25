<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandImage
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandImage extends Entity
{
    const MAX_LENGTH_NAME = 100;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Stand
     */
    private $stand;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return StandImage
     */
    public function setName(string $name): StandImage
    {
        $this->notEmpty($name, 'El Nombre de la Imagen del Stand no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre de la Imagen del Stand debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
        $this->name = $name;

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
     * @return StandImage
     */
    public function setType(string $type): StandImage
    {
        $this->notEmpty($type, 'El tipo de la Imagen del Stand no puede estar vacío');
        $this->choice($type, StandImageType::getConstants(), sprintf('No es una opción válida: [%s]', implode(StandImageType::getConstants(), ' , ')));
        $this->type = $type;

        return $this;
    }

    /**
     * @return Stand
     */
    public function getStand(): Stand
    {
        return $this->stand;
    }

    /**
     * @param Stand $stand
     * @return StandImage
     */
    public function setStand(Stand $stand): StandImage
    {
        $this->stand = $stand;

        return $this;
    }
}
