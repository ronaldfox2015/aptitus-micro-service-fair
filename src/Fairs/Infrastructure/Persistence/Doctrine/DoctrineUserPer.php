<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Doctrine;

use Aptitus\Common\Adapter\Persistence\Doctrine\DoctrineRepository;
use Aptitus\Fairs\Domain\Model\Users\Enum\TypeState;
use Aptitus\Fairs\Domain\Model\Users\User;
use Aptitus\Fairs\Domain\Model\Users\UserRepository;

/**
 * Class DoctrineUserPer
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Doctrine;
 * @author Jospeh Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class DoctrineUserPer extends DoctrineRepository implements UserRepository
{
    /**
     * @param $email
     * @return User
     */
    public function findByEmail($email)
    {
        return $this->repository->findOneBy(['email' => $email, 'state' => TypeState::ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public function persist(User $user)
    {
        $this->em->persist($user);
        $this->em->flush($user);

        return true;
    }
}
