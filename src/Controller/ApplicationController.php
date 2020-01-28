<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\OrientationRace;

class ApplicationController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function application()
    {
        return $this->render("application/index.html.twig");
    }
}