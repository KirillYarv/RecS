<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\DBAL\Connection;

final class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(Connection $connection): Response
    {
        $client = HttpClient::create();
        $response = $client->request(
            'GET',
            'http://host.docker.internal:8081/ml/api/pairs'
        );

        $statusCode = $response->getStatusCode();
        $contentType = $response->getHeaders()['content-type'][0];
        $content = $response->toArray();
        dump($content);
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
