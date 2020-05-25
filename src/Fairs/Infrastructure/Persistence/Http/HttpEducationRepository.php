<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Http;

use Aptitus\Common\Adapter\Persistence\Http\AbstractHttpGuzzle;
use Aptitus\Common\Exception\Exception;
use Aptitus\Fairs\Domain\Model\Customers\EducationRepository;
use Aptitus\Fairs\Domain\Model\File\Feed;

/**
 * Class HttpEducationRepository
 *
 * @package Aptitus\Fairs\Infrastructure\Persistence\Http
 * @author Jairo Rojas <jairo.rafa.1997@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class HttpEducationRepository extends AbstractHttpGuzzle implements EducationRepository
{
    /**
     * @param $params
     * @return mixed
     */
    public function findEducationRecords($params)
    {
        try {
            $params['limit'] = Feed::DEFAULT_ROWS_LIMIT;
            $response = $this->client->post('fair/v1/feed', [
                'json' => [ 'companies' => $params ]
            ]);
            if (! ($response->getStatusCode() >= 200 && $response->getStatusCode() < 300)) {
                throw new Exception('No se pudo consultar los datos.');
            }
            return $this->decodeJson($response);
        } catch (Exception $exception) {
            $this->logger->error($exception->getMessage(), $exception->getTrace());
        }
    }
}
