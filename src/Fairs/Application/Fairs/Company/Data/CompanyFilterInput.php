<?php

namespace Aptitus\Fairs\Application\Fairs\Company\Data;

use Aptitus\Common\Adapter\Input\AbstractInput;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\CompanySortType;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\OrderType;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class CompanyFilterInput
 *
 * @package Aptitus\Fairs\Application\Fairs\Company\Data
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2017, Orbis
 *
 * @method string category()
 * @method string preview()
 * @method string sort()
 * @method string order()
 */
class CompanyFilterInput extends AbstractInput
{
    protected $category;
    protected $preview;
    protected $sort;
    protected $order;

    public function __construct(
        $category,
        $preview,
        $sort = null,
        $order = null
    ) {
        $this->category = $category;
        $this->preview = $preview;
        $this->setSort($sort);
        $this->setOrder($order);
    }

    public function setSort($sort)
    {
        if (!empty($sort)) {

            if (CompanySortType::isValidName($sort)) {
                $sort = CompanySortType::getValue($sort);
            } else {
                throw new BadRequestHttpException(sprintf('El filtro sort %s es invalido', $sort));
            }

        }

        $this->sort = $sort;
    }

    public function setOrder($order)
    {
        if (empty($order)) {
            $order = OrderType::DESC;
        } else {

            if (!OrderType::isValidName($order)) {
                throw new BadRequestHttpException(sprintf('El filtro de ordenamiento %s es invalido.', $order));
            }

        }

        $this->order = OrderType::getValue($order);
    }
}
