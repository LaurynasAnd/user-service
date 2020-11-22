<?php

namespace App\Controller;

use App\Service\DataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserController extends AbstractController
{
    private $dataService;

    public function __construct(DataService $dataService){
        $this->dataService = $dataService;
    }
    /**
     * @Route("/", name="user_index")
     */
    public function index(): Response
    {
        $data = $this->dataService->fetchData();// (new DataService())->fetchData();
        // _prd($data);
        $isLoaded = $data ? 'loaded' : 'not loaded';
        return $this->render('user/index.html.twig', [
            'data' => $data,
            'loaded' => $isLoaded
        ]);
    }
}
