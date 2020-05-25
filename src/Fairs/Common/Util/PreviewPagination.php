<?php

namespace Aptitus\Fairs\Common\Util;

/**
 * Class PreviewPagination
 *
 * @package Aptitus\Fairs
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class PreviewPagination
{
    const IS_ACTIVE = 'active';
    const FIRST_POSITION = 0;

    /** @var  array */
    private $data;

    /** @var  int */
    private $id;

    /**
     * @param array $data
     * @param $id
     */
    public function __construct(array $data, $id)
    {
        $this->data = $data;
        $this->id = $id;
    }

    /* Verifica si hay array dentro de un array para obtener solo los ids */
    /**
     * @param array $data
     * @return array
     */
    private function treatArray(array $data)
    {
        if (is_array($this->data[0])) {
            $data = array_map(function ($ar) {
                return $ar['id'];
            }, $this->data);
        }

        return $data;
    }

    /**
     * @return mixed
     */
    public function getActualPosition()
    {
        return array_search($this->id, $this->treatArray($this->data));
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return count($this->treatArray($this->data));
    }

    /**
     * @return int
     */
    public function getFirstPosition()
    {
        return self::FIRST_POSITION;
    }

    /**
     * @return int
     */
    public function getLastPosition()
    {
        return $this->getCount() - 1;
    }

    /**
     * @return int|mixed
     */
    public function getNextPosition()
    {
        return ($this->getActualPosition() >= $this->getLastPosition()) ?
            $this->getFirstPosition() :
            $this->getActualPosition() + 1;
    }

    /**
     * @return int|mixed
     */
    public function getPreviousPosition()
    {
        return ($this->getActualPosition() == $this->getFirstPosition()) ?
            $this->getLastPosition() :
            $this->getActualPosition() - 1;
    }

    /**
     * @return array
     */
    public function getPreview()
    {
        return [
            'next' => $this->data[$this->getNextPosition()],
            'previous' => $this->data[$this->getPreviousPosition()]
        ];
    }
}
