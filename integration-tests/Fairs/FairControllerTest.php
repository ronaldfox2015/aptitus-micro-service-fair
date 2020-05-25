<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\IntegrationTests\Bootstrap\Login;
use Aptitus\IntegrationTests\Common\AptTestIntegration;
use Aptitus\IntegrationTests\Common\CodeHttpException;

/**
 * Class CompaniesControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Victor Garcia <victor.garcia@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class FairControllerTest extends AptTestIntegration
{
    const DEFAULT_FAIR = 1;
    const NOT_FOUND_FAIR = 1000;
    const DEFAULT_COMPANY = 1;

    private function getUrl()
    {
        return sprintf('/%s/fair', self::API_VERSION);
    }

    public function getFairId()
    {
        return self::DEFAULT_FAIR;
    }

    public function getNotFoundFairId()
    {
        return self::NOT_FOUND_FAIR;
    }

    public function getCompanyId()
    {
        return self::DEFAULT_COMPANY;
    }

    public function getCompaniesUrl($fairId)
    {
        return sprintf('%s/fairs/%s/companies', $this->getUrl(), $fairId);
    }

    public function getDeleteCompanyUrl($fairId, $companyId)
    {
        return sprintf('%s/fairs/%s/companies/%s', $this->getUrl(), $fairId, $companyId);
    }

    public function testCompaniesSuccess()
    {
        $fairId = $this->getFairId();
        $response = $this->request('GET', $this->getCompaniesUrl($fairId));
        $this->assertEquals(200, $response->statusCode());
        $companies = $response->body();
        $this->assertNotEmpty($companies);
        $this->assertCount(12, $companies);

        foreach ($companies as $company) {
            $this->assertCount(7, $company);
            $this->assertEmpty($this->validateCompanyFields($company));
        }
    }

    public function testCompaniesEmptySuccess()
    {
        $fairId = $this->getNotFoundFairId();
        $response = $this->request('GET', $this->getCompaniesUrl($fairId));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEmpty($response->body());
    }

    public function testDeleteCompanySuccess()
    {
        $fairId = $this->getFairId();
        $companyId = $this->getCompanyId();
        $category = "Empleo";

        $response = $this->request('DELETE', $this->getDeleteCompanyUrl($fairId, $companyId),
            ['category' => $category]);

        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se eliminó la empresa satisfactoriamente.', $response->body()['message']);

        $response = $this->request('GET', $this->getCompaniesUrl($fairId));

        $this->assertEquals(200, $response->statusCode());
        $companies = $response->body();
        $this->assertNotEmpty($companies);
        $this->assertCount(11, $companies);
    }

    public function testDeleteCompanyError()
    {
        $fairId = $this->getNotFoundFairId();
        $companyId = $this->getCompanyId();
        $category = "Empleo";

        $response = $this->request('DELETE', $this->getDeleteCompanyUrl($fairId, $companyId),
            ['category' => $category]);
        $this->assertEquals(404, $response->statusCode());
        $this->assertEquals("No se encontró la Feria.",
            $response->body()['message']);

        $response = $this->request('GET', $this->getCompaniesUrl($fairId));
    }

    public function validateCompanyFields($companyRecord)
    {
        $namedFieldsCorrectly = array(
            'id' => 0,
            'name' => 1,
            'category' => 2,
            'document_number' => 3,
            'model' => 4,
            'stand' => 5
        );
        $evaluationTest = array_diff_key($namedFieldsCorrectly, $companyRecord);
        return $evaluationTest;
    }

}
