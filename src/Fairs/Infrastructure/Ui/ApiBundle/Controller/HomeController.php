<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;

use Aptitus\Common\Symfony\Response\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class HomeController
 *
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller
 * @author Andy Ecca <andy.ecca@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return new JsonResponse([
            'alive' => true
        ]);
    }

    /**
     * @Route("/doc", name="doc")
     */
    public function docAction()
    {
        return $this->render('Apidoc.html.php');
    }
}
