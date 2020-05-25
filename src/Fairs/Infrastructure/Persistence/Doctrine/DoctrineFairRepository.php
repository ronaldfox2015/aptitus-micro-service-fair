<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Fairs\FairRepository;

/**
 * Class DoctrineUserRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class DoctrineFairRepository extends DoctrineRepository implements FairRepository
{

    /**
     * {@inheritdoc}
     */
    public function findById($fairId)
    {
        return $this->repository->find($fairId);
    }
}
