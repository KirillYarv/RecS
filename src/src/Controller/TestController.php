<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\DBAL\Connection;

final class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(Connection $connection): Response
    {
        dump($connection->isConnected());
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
