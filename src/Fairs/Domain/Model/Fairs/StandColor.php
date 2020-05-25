<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandColor
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandColor extends Entity
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
     * @return StandColor
     */
    public function setName(string $name): StandColor
    {
        $this->notEmpty($name, 'El Nombre del Color del Stand no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre del Color del Stand debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
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
     * @return StandColor
     */
    public function setType(string $type): StandColor
    {
        $this->notEmpty($type, 'El tipo del Color del Stand no puede estar vacío');
        $this->choice($type, StandColorType::getConstants(), sprintf('No es una opción válida: [%s]', implode(StandColorType::getConstants(), ' , ')));
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
     * @return StandColor
     */
    public function setStand(Stand $stand): StandColor
    {
        $this->stand = $stand;
        return $this;
    }
}
