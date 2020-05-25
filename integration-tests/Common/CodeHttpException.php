<?php

namespace Aptitus\IntegrationTests\Common;

/**
 * CodeHttpException Class
 *
 * @package Aptitus\IntegrationTests\Test
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class CodeHttpException extends \Exception
{
    private $body;

    /**
     * CodeHttpException constructor.
     * @param string $message
     * @param AptTestResponse $response
     */
    public function __construct($message, AptTestResponse $response)
    {
        parent::__construct($message, $response->statusCode());
        $this->body = $response->body();
    }

    /**
     * @return array
     */
    public function getBody()
    {
        return $this->body;
    }
}
