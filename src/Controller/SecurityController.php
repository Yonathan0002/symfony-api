<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController{
    /**
     * @Route("/login")
     */
    public function application()
    {
        return $this->render("application/login.html.twig");
    }
}