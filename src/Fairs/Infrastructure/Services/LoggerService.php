<?php

namespace Aptitus\Fairs\Infrastructure\Services;

use Aptitus\Common\Log\CloudWatchLog;
use Aws\CloudWatchLogs\CloudWatchLogsClient;

/**
 * Class LoggerService
 *
 * @package Aptitus\Fairs\Infrastructure\Services
 *
 * @author Paul Taboada <pacharly89@gmail.com>
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class LoggerService extends CloudWatchLog
{
    protected $options;

    public function __construct(CloudWatchLogsClient $client, array $options)
    {
        $this->options = $options;

        parent::__construct(
            $client,
            $options['options']['log']['groupName'],
            $options['options']['log']['streamName'],
            $options['options']['log']['retentionDays']
        );
    }
}
