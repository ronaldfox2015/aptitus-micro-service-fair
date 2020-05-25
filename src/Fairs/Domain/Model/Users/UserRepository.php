<?php

namespace Aptitus\Fairs\Domain\Model\Users;

/**
 * Class UserRepository
 *
 * @package Aptitus\Fairs\Domain\Model\Users;
 * @author Jospeh Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
interface UserRepository
{
    /**
     * @param $email
     * @return User
     */
    public function findByEmail($email);

    /**
     * @param User $user
     * @return mixed
     */
    public function persist(User $user);
}
