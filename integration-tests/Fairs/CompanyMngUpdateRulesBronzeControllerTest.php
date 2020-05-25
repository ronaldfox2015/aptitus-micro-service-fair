<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\Fairs\Domain\Model\Fairs\Enum\StandType;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class CompanieUpdateControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanyMngUpdateRulesBronzeControllerTest extends AptTestIntegration
{
    const FAIR_EXPOAPTITUS_ID = 1;
    const COMPANY_APTITUS_ID = 1;

    //companies
    private function getUrl()
    {
        return sprintf('/%s/fair', self::API_VERSION);
    }

    private static function getParams()
    {
        return [
            'document_number' => '20520603892',
            'trade_name' => 'ATENTO DEL PERU',
            'business_name' => 'TELEATENTO DEL PERU S.A.C',
            'slug' => 'atento-peru',
            'logo' => 'RTIUR546RT546REEyutsdds42DQA.jpg',
            'category' => 'Empleo',
            'industry_id' => 1,
            'industry_name' => 'Call Center',
            'stand' => [
                'type_id' => StandType::BRONZE_ID,
                'model_id' => 4,
                'amphitryon' => 3,
                'colors' => [
                    'color_1' => '#2abf2a',
                    'color_2' => '#0027ea'
                ],
                'images' => [
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_monitor'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_banderole_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_poster_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_top'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_counter'
                    ]
                ],
                'video' => 'https://www.youtube.com/watch?v=5o_nExedezw'
            ],
            'profile' => [
                [
                    'title' => 'Misión',
                    'description' => 'Misión de nuestra empresa en llevar a cabo...'
                ],
                [
                    'title' => 'Nuestros Productos',
                    'description' => 'Nuestros productos respetan los estándares más altos de calidad ISO 9000...'
                ]
            ],
            'social_media' => [
                [
                    'link' => 'https://www.facebook.com/zuck',
                    'name' => 'Facebook'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=5o_nExedezw',
                    'name' => 'Youtube'
                ]
            ],
            'image_gallery' => [
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ],
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ]
            ],
            'document' => [
                [
                    'title' => 'Brochure 2017',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx'
                ],
                [
                    'title' => 'Perfil Institucional',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls'
                ]
            ]
        ];
    }

    private function getUrlUpdateCompanyFair($fairId = self::FAIR_EXPOAPTITUS_ID, $companyId = self::COMPANY_APTITUS_ID)
    {
        return sprintf(
            '%s/fairs/%s/companies/%s?category=%s',
            $this->getUrl(),
            $fairId,
            $companyId,
            'Empleo'
        );
    }

    private function validateSqlStandTypeRule($typeId, $type)
    {
        return $this->em->createQueryBuilder()
            ->select('str')
            ->from('Fairs:Fairs\StandTypeRule', 'str')
            ->where('str.standType = :typeId')
            ->andWhere('str.rule LIKE :type')
            ->andWhere('str.state = :state')
            ->setParameters([
                'typeId' => $typeId,
                'type' => $type,
                'state' => 1
            ])
            ->getQuery()
            ->getArrayResult();
    }

    private static function isValidStandTypeRuleImages($params = array(), $rules = array())
    {
        $items = [];
        foreach ($rules as $value) {
            foreach ($params as $v) {
                if (!empty($v['type']) && $value['rule'] == $v['type'] && $value['required']) {
                    $items[] = $value;
                    break;
                }
            }
        }
        return count($rules) == count($items);
    }

    private static function isValidStandTypeRuleColor($params = array(), $rules = array())
    {
        $items = [];

        foreach ($rules as $value) {

            if (!empty($params[$value['rule']]) && $value['required']) {
                    $items[] = true;
                }
        }
        return count($rules) == count($items);
    }

    public function testStandImagesSuccess()
    {
        $params = self::getParams();
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'image%');
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(true, self::isValidStandTypeRuleImages($params['stand']['images'], $rules));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
    }

    public function testStandColorSuccess()
    {
        $params = self::getParams();
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'color%');
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);

        $this->assertEquals(true, self::isValidStandTypeRuleColor($params['stand']['colors'],$rules));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
    }

    public function testStandAmphitryonSuccess()
    {
        $params = self::getParams();
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'amphitryon%');
        $amphitryonId = $rules[0]['rule'];
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(true, !empty($params['stand'][$amphitryonId]));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
    }


    /**
     * valida si existe una color color_1
     */
    public function testFairCompanyErrorColorOne()
    {
        $params = self::getParams();
        unset($params['stand']['colors']['color_1']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Color 1', $response->body()['message']);
    }

    /**
     * valida si existe una color color_2
     */
    public function testFairCompanyErrorColorTwo()
    {
        $params = self::getParams();
        unset($params['stand']['colors']['color_2']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Color 2', $response->body()['message']);
    }

    public static function isValidSampleData($data, $type)
    {
        $items = [];
        foreach ($data as $value) {
            if ($value['type'] != $type) {
                $items[] = $value;
            }
        }
        return $items;
    }
}