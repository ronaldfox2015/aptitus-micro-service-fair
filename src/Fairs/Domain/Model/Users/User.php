<?php

namespace Aptitus\Fairs\Domain\Model\Users;

use Aptitus\Common\Domain\Model\Entity;
use \DateTime;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 *
 * @package Aptitus\Fairs\Domain\Model\Users
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class User extends Entity implements UserInterface
{
    const MAX_LENGTH_EMAIL = 100;
    const MIN_LENGTH_EMAIL = 4;
    const MIN_LENGTH_PASSWORD = 6;
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $rol;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var DateTime
     */
    private $createdAt;

    /**
     * @var DateTime
     */
    private $lastDateLogin;

    /**
     * @var int
     */
    private $state;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param string $rol
     * @return User
     */
    public function setRol($rol)
    {
        $this->rol = $rol;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->notEmpty($email, 'Email no puede estar vacío');
        $this->maxLength($email, self::MAX_LENGTH_EMAIL, sprintf('Email debe tener máximo %s caracteres', self::MAX_LENGTH_EMAIL));
        $this->minLength($email, self::MIN_LENGTH_EMAIL, sprintf('Email debe tener al menos %s caracteres', self::MIN_LENGTH_EMAIL));
        $this->email($email, 'Email inválido');
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->notEmpty($password, 'Contraseña no puede estar vacío');
        $this->minLength($password, self::MIN_LENGTH_PASSWORD, sprintf('Contraseña debe tener al menos %s caracteres', self::MIN_LENGTH_PASSWORD));
        $this->password = $password;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getLastDateLogin()
    {
        return $this->lastDateLogin;
    }

    /**
     * @param DateTime $lastDateLogin
     * @return User
     */
    public function setLastDateLogin($lastDateLogin)
    {
        $this->lastDateLogin = $lastDateLogin;
        return $this;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param int $state
     * @return User
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Returns the roles granted to the user.
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     * @return array (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return [$this->getRol()];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     * This can return null if the password was not encoded using a salt.
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Removes sensitive data from the user.
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
