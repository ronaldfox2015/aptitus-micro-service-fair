<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandVideo
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandVideo extends Entity
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
     * @return StandVideo
     */
    public function setName(string $name): StandVideo
    {
        $this->notEmpty($name, 'El Nombre del Video del Stand no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre del Video del Stand debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
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
     * @return StandVideo
     */
    public function setType(string $type): StandVideo
    {
        $this->notEmpty($type, 'El tipo del Video del Stand no puede estar vacío');
        $this->choice($type, StandVideoType::getConstants(), sprintf('No es una opción válida: [%s]', implode(StandVideoType::getConstants(), ' , ')));
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
     * @return StandVideo
     */
    public function setStand(Stand $stand): StandVideo
    {
        $this->stand = $stand;
        return $this;
    }
}
