<?php

namespace Aptitus\Fairs\Infrastructure\Persistence\Http;

use Aptitus\Common\Adapter\Persistence\Http\AbstractHttpGuzzle;
use Aptitus\Fairs\Domain\Model\Customers\JobSearchRepository;
use Aptitus\Fairs\Domain\Model\File\Feed;
use Exception;

/**
 * Class HttpJobSearchRepository
 *
 * @package Aptitus\Jobs\Infrastructure\Persistence\Http
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class HttpJobSearchRepository extends AbstractHttpGuzzle implements JobSearchRepository
{
    public function findJobs($params)
    {
        try {
            $params['limit'] = Feed::DEFAULT_ROWS_LIMIT;
            $response = $this->client->get('jobs/search', [
                'query' => $params
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
