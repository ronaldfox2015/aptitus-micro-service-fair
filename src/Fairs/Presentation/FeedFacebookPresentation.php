<?php

namespace Aptitus\Fairs\Presentation;

use Aptitus\Fairs\Domain\Model\Fairs\Fair;
use Aptitus\Fairs\Domain\Model\File\Feed;

/**
 * Class FeedFacebookPresentation
 *
 * @package Aptitus\Fairs\Presentation
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class FeedFacebookPresentation
{
    public static function formatData($job, $expoApitusHost)
    {
        return [
            'id' => $job['id'],
            'availability' => ($job['active']) ? Feed::ACTIVE_JOB : '',
            'condition' => Feed::DEFAULT_CONDITION,
            'brand' => $job['company'],
            'description' => $job['area'],
            'image_link' => $job['image'],
            'link' => self::formatJobUtmUrl($job, $expoApitusHost),
            'title' => mb_convert_case($job['title'], MB_CASE_TITLE, 'UTF-8'),
            'price' => Feed::DEFAULT_PRICE,
            'custom_label_0' => empty($job['modality']) ? '' : $job['modality'],
            'custom_label_1' => $job['location'],
            'custom_label_2' => empty($job['level']) ? '' : $job['level'],
            'custom_label_3' => self::formatStandType($job['company_stand'])
        ];
    }

    private static function formatStandType($companyStand)
    {
        return ($companyStand['slug'] == Fair::FEATURED_SLUG) ? Feed::FEATURED_STAND_TYPE : $companyStand['stand_type'];
    }

    private static function formatCompanySlug($slug)
    {
        return str_replace('-', '+', $slug);
    }

    private static function formatJobUtmUrl($job, $expoApitusHost)
    {
        $expoAptitusUrl = sprintf("%s/empleos/%s/avisos/%s-%s", $expoApitusHost, $job['company_slug'], $job['slug'], $job['id']);

        return sprintf(
            '%s?utm_source=%s&utm_medium=%s&utm_campaign=%s&utm_term=%s&utm_content=%s',
            $expoAptitusUrl,
            Feed::UTM_SOURCE,
            Feed::UTM_MEDIUM,
            Feed::UTM_CAMPAIGN,
            Feed::UTM_TERM,
            self::formatCompanySlug($job['company_slug'])
        );
    }
}
