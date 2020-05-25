<?php

namespace Aptitus\Fairs\Presentation;

use Aptitus\Fairs\Domain\Model\Fairs\SponsorFair;

/**
 * Class SponsorPresentation
 *
 * @package Aptitus\Fairs\Presentation
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
class SponsorPresentation
{
    public static function formatDataListSponsors($sponsorFairs)
    {
        $response = [];

        /** @var SponsorFair $sponsorFair */
        foreach ($sponsorFairs as $sponsorFair) {
            $item = [];

            $item['id'] = $sponsorFair->getId();
            $item['companyName'] = $sponsorFair->getSponsor()->getCompanyName();
            $item['category'] = $sponsorFair->getCategory();
            $item['image'] = $sponsorFair->getSponsor()->getImage();
            $item['url'] = $sponsorFair->getSponsor()->getUrl();
            $item['coords'] = [
                'desktop' => $sponsorFair->getMapping(),
                'tablet' => $sponsorFair->getMappingTablet()
            ];

            $response[] = $item;
        }

        return $response;
    }

    public static function formatDataSponsor(SponsorFair $sponsorFair, $urlImage)
    {
        $response = [];

        $response['id'] = $sponsorFair->getId();
        $response['companyName'] = $sponsorFair->getSponsor()->getCompanyName();
        $response['category'] = $sponsorFair->getCategory();
        $response['image'] = $sponsorFair->getSponsor()->getImage();
        $response['url_image'] = $urlImage;
        $response['url'] = $sponsorFair->getSponsor()->getUrl();
        $response['coords'] = [
            'desktop' => $sponsorFair->getMapping(),
            'tablet' => $sponsorFair->getMappingTablet()
        ];

        return $response;
    }
}