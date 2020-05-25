<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\Common\Symfony\Response\JsonResponse;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class FeedFacebookControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class FeedFacebookControllerTest extends AptTestIntegration
{
    const PAGE = 'facebook';
    const FAIR_VERSION = 1;

    private function getUrl($page)
    {
        return sprintf('/%s/fair/fairs/%s/feed/%s', self::API_VERSION, self::FAIR_VERSION, $page);
    }

    public function testInvalidPageName()
    {
        $response = $this->request('POST', $this->getUrl('unknown'));
        $this->assertEquals(404, $response->statusCode());
    }

    public function testGenerateFeed()
    {
        $response = $this->request('POST', $this->getUrl(self::PAGE));
        $this->assertEquals(JsonResponse::HTTP_OK, $response->statusCode());
        $this->assertEquals('Se generó el feed facebook correctamente.', $response->body()['message']);
        $this->assertNotEmpty($response->body()['link']);
    }
}
