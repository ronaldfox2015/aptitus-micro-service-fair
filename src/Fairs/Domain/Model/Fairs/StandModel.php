<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandModel
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandModel extends Entity
{
    const MAX_LENGTH_NAME = 30;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $state;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return StandModel
     */
    public function setName(string $name): StandModel
    {
        $this->notEmpty($name, 'El Nombre del Modelo del Stand no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre del Modelo del Stand debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
        $this->name = $name;

        return $this;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return StandModel
     */
    public function setState(int $state): StandModel
    {
        $this->notEmpty($state, 'El Estado del Modelo del Stand no puede estar vacío');
        $this->integer($state, 'El Estado del Modelo del Stand debe ser booleano');
        $this->state = $state;

        return $this;
    }
}
