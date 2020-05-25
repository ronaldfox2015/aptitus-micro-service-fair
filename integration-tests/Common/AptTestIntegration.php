<?php

namespace Aptitus\IntegrationTests\Common;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * MisaIntegrationTest Class
 *
 * @package Aptitus\IntegrationTests\Test
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class AptTestIntegration extends WebTestCase
{

    const API_VERSION = 'v1';

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $em;

    /**
     * @var array
     */
    protected $content = ['CONTENT_TYPE' => 'application/json' ,'token' =>''];

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * {@inheritDoc}
     */
    protected function tearDown()
    {
        parent::tearDown();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }

    /**
     * @param $method
     * @param $uri
     * @param array $parameters
     * @return AptTestResponse
     */
    public function request($method, $uri, $parameters = [])
    {
        $client = static::createClient();
        $client->enableProfiler();

        if(isset($parameters['token'])){
            $this->setToken($parameters['token']);
            unset($parameters['token']);
        }

        $crawler = $client->request($method, $uri, $parameters, [], $this->getContent());
        $data = json_decode($client->getResponse()->getContent(), true);
        $statuscode = $client->getResponse()->getStatusCode();
        $response = new AptTestResponse($statuscode, $data);

        return $response;
    }

    /**
     * @return array
     */
    private function getContent()
    {
      return $this->content;
    }

    /**
     * @param $argument
     */
    private function setToken($argument)
    {
        $this->content['token'] = $argument;
    }
}
