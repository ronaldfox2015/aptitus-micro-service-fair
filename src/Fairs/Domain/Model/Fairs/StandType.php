<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandType
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandType extends Entity
{
    const MAX_LENGTH_NAME = 10;

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
     * @return StandType
     */
    public function setName(string $name): StandType
    {
        $this->notEmpty($name, 'El Nombre del Tipo del Stand no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre del Tipo del Stand debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
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
     * @return StandType
     */
    public function setState(int $state): StandType
    {
        $this->notEmpty($state, 'El Estado del Tipo del Stand no puede estar vacío');
        $this->boolean($state, 'El Estado del Tipo del Stand debe ser booleano');
        $this->state = $state;

        return $this;
    }
}
