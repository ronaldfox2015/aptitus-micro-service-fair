<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\IntegrationTests\Bootstrap\Login;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class CompaniesControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class DetailCompanyControllerTest extends AptTestIntegration
{
    const DEFAULT_FAIR = 1;
    const DEFAULT_COMPANY = 1;

    private function getUrl()
    {
        return sprintf('/%s/fair', self::API_VERSION);
    }

    public function getFairId()
    {
        return self::DEFAULT_FAIR;
    }

    public function testDetailCompanySuccess()
    {
        $fairId = $this->getFairId();
        $companyId = 2;
        $response = $this->request('GET', $this->getUrl() . "/fairs/$fairId/companies/$companyId?category=Empleo", [
            'token' => Login::getToken()
        ]);
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals(12, count($response->body()));
    }

    public function testDetailCompanySuccessWithDifferentCategory()
    {
        $fairId = $this->getFairId();
        $companyId = self::DEFAULT_COMPANY;
        $response = $this->request('GET', $this->getUrl() . "/fairs/$fairId/companies/$companyId?category=Educacion", [
            'token' => Login::getToken()
        ]);
        $this->assertEquals(404, $response->statusCode());
        $this->assertEquals('No se encontró el detalle de la Empresa en la Feria.', $response->body()['message']);
    }

    public function testDetailCompanyError()
    {
        $fairId = $this->getFairId();
        $companyId = 10000;
        $response = $this->request('GET', $this->getUrl(). "/fairs/$fairId/companies/$companyId?category=Empleo", [
            'token' => Login::getToken()
        ]);
        $this->assertEquals(404, $response->statusCode());
        $this->assertEquals('No se encontró el detalle de la Empresa en la Feria.', $response->body()['message']);
    }
}
