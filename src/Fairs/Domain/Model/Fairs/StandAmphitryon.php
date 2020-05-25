<?php

namespace Aptitus\Fairs\Domain\Model\Fairs;

use Aptitus\Common\Domain\Model\Entity;

/**
 * Class StandAmphitryon
 *
 * @package Aptitus\Fairs\Domain\Model\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class StandAmphitryon extends Entity
{
    const MAX_LENGTH_NAME = 20;

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
     * @return StandAmphitryon
     */
    public function setName(string $name): StandAmphitryon
    {
        $this->notEmpty($name, 'El Nombre del Anfitrión no puede estar vacío');
        $this->maxLength($name, self::MAX_LENGTH_NAME, sprintf('El Nombre del Anfitrión debe tener máximo %s caracteres', self::MAX_LENGTH_NAME));
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
     * @return StandAmphitryon
     */
    public function setState(int $state): StandAmphitryon
    {
        $this->state = $state;

        return $this;
    }
}
