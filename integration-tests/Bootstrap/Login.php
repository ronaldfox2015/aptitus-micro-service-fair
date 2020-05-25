<?php

namespace Aptitus\IntegrationTests\Bootstrap;

use Aptitus\IntegrationTests\Common\AptTestIntegration;

class Login
{
    static $token = null;
    const EMAIL = 'administrador@aptitus.com';
    const WRONG_EMAIL = 'adminmail.com';
    const PASSWORD = 'feriaaptitus2017';
    const WRONG_PASSWORD = '12345678';

    public static function getToken(){
        if (self::$token === null) {
            $login = self::getLogin();
            self::$token = $login['token'];
        }

        return self::$token;
    }

    private static function getLogin(){
        $AptTestIntegration = new AptTestIntegration();

        $response = $AptTestIntegration->request('POST', self::getLoginUrl(), [
            'email' => self::EMAIL,
            'password' => self::PASSWORD
        ]);
        $login = $response->body();
        return $login;
    }

    private static function getLoginUrl(){
        return sprintf('/%s/fair/login', AptTestIntegration::API_VERSION);
    }

}
