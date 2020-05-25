<?php

namespace Aptitus\Fairs\Presentation;

/**
 * Class FeedExpogradosPresentation
 *
 * @package Aptitus\Fairs\Presentation
 * @author Jairo Rojas <jairo.rafa.1997@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class FeedExpogradosPresentation
{
    const UTM = '?utm_campaign=expogrados&'.
    'utm_medium=cpc&'.'utm_source=facebook&'.
    'utm_content=feed+expogrados+240918&'.
    'utm_term=feed';

    public static function formatData($job)
    {
        $job['title'] = ucfirst(mb_strtolower($job['title'], 'UTF-8'));

        return [
            'id' => $job['id'],
            'availability' => $job['availability'],
            'condition' => $job['condition'],
            'description' => !empty($job['certification']) ? $job['certification'] : $job['title'],
            'image_link' => $job['image_link'],
            'link' => sprintf('%s%s', $job['link'], FeedExpogradosPresentation::UTM),
            'title' => $job['title'],
            'price' => $job['price'],
            'brand' => $job['brand'],
            'custom_label_0' => empty($job['nombre_tipo_educacion']) ? '' : $job['nombre_tipo_educacion'],
            'custom_label_1' => empty($job['mode']) ? '' : $job['mode'],
            'custom_label_2' => $job['ubigeo'],
        ];
    }

}
