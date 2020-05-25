<?php

namespace Aptitus\Fairs\Application\User;

use Aptitus\Common\Exception\ClientException;
use Aptitus\Fairs\Domain\Model\Users\User;
use Aptitus\Fairs\Domain\Model\Users\UserRepository;
use Aptitus\Fairs\Infrastructure\Services\Encrypt\Jwt;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class LoginService
 *
 * @package Aptitus\Fairs\Application\User;
 * @author Jospeh Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class LoginService
{
    const SESSION_TIME_EXPIRATION = 60 * 60 * 24;

    protected $userRepository;
    protected $passwordEncoder;
    protected $jwt;

    public function __construct(
        UserRepository $userRepository,
        UserPasswordEncoderInterface $passwordEncoder,
        JWT $jwt
    )
    {
        $this->userRepository = $userRepository;
        $this->passwordEncoder = $passwordEncoder;
        $this->jwt = $jwt;
    }

    public function signUp($email, $password)
    {
        $email = trim($email);
        $this->validationInput($email, $password);
        $user = $this->userRepository->findByEmail($email);

        if (!is_null($user)) {
            $verifyPassword = $this->passwordEncoder->isPasswordValid($user, $password);
            if ($verifyPassword) {
                $user->setLastDateLogin(new \DateTime());
                $this->userRepository->persist($user);
                $data = [
                    'id' => $user->getId(),
                    'name' => $user->getName(),
                    'surname' => $user->getSurname(),
                    'email' => $user->getEmail()
                ];

                $jwt = $this->jwt->encode($data, self::SESSION_TIME_EXPIRATION);

                return $jwt;
            }
        }
        return false;
    }

    public function validationInput($email, $password)
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
    }
}