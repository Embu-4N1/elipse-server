<?php

namespace App\Controller;

use App\Entity\Example;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Example Controller.
 * @Route("/api", name="api_")
 */
class ExampleController extends AbstractFOSRestController
{
    /**
     * Get one example.
     * @Rest\Get("/example/{example}")
     */
    public function getOne(?int $example): Response
    {
        $repository = $this->getDoctrine()->getRepository(Example::class);
        return $this->handleView($this->view($repository->find($example)));
    }

    /**
     * List examples.
     * @Rest\Get("/example")
     */
    public function list(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Example::class);
        return $this->handleView($this->view($repository->findAll()));
    }
}
