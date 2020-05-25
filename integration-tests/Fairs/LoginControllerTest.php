<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\IntegrationTests\Bootstrap\Login;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class LoginControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Jospeh Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class LoginControllerTest extends AptTestIntegration
{
    private function getEmail(){
        return Login::EMAIL;
    }

    private function getWrongEmail(){
        return Login::WRONG_EMAIL;
    }

    private function getPassword(){
        return Login::PASSWORD;
    }

    private function getWrongPassword(){
        return Login::WRONG_PASSWORD;
    }

    private function getUrl()
    {
        return sprintf('/%s/fair/login', self::API_VERSION);
    }

    public function testLogin()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ]);

        $this->assertEquals(200, $response->statusCode());
    }

    public function testLoginError()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getEmail(),
            'password' => $this->getWrongPassword()
        ]);

        $this->assertEquals(401, $response->statusCode());
    }

    public function testParameterLogin()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getWrongEmail(),
            'password' => $this->getPassword()
        ]);

        $this->assertEquals(400, $response->statusCode());
    }

    public function testInvalidUserMessage()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getEmail(),
            'password' => $this->getWrongPassword()
        ]);

        $this->assertEquals('Las credenciales son incorrectas.', $response->body()['message']);
    }

    public function testMessageSuccessLogin()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getEmail(),
            'password' => $this->getPassword()
        ]);

        $this->assertEquals('Se inició sesión correctamente.', $response->body()['message']);
    }

    public function testMessageEmailError()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getWrongEmail(),
            'password' => $this->getPassword()
        ]);

        $this->assertEquals('Email inválido', $response->body()['message']);
    }

    public function testEmailEmptyMessage()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => '',
            'password' =>  $this->getPassword()
        ]);

        $this->assertEquals('Email no puede estar vacío', $response->body()['message']);
    }

    public function testPasswordEmptyMessage()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getEmail(),
            'password' => ''
        ]);

        $this->assertEquals('Contraseña no puede estar vacío', $response->body()['message']);
    }

    public function testPasswordFailMessage()
    {
        $response = $this->request('POST', $this->getUrl(), [
            'email' => $this->getEmail(),
            'password' => $this->getWrongPassword()
        ]);

        $this->assertEquals('Las credenciales son incorrectas.', $response->body()['message']);
    }
}
