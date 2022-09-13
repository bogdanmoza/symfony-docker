<?php
declare(strict_types=1);

namespace App\Controller;

use Predis\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController extends AbstractController
{
    #[Route(path: '/example', name: 'example')]
    public function example(Client $redisClient): Response
    {
        $redisClient->set('test_key', 'test_value');

        return new Response($redisClient->get('test_key'));
    }
}
