<?php

namespace You\BookingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\SerializationContext;

/**
 * @Route("/front/json")
 */
class FrontJSONController extends Controller
{

    private $serializer;

    /**
     * JSONController constructor.
     */
    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @Route("/categories", name="json_categories")
     */
    public function jsonCategoriesAction()
    {

        $categoryManager = $this->container->get("youbookingbundle.category_manager");

        $categories = $categoryManager->findAllCategories();

        $categoriesJSON = $this->serializer->serialize($categories, "json", SerializationContext::create()->enableMaxDepthChecks());

        $response = new Response($categoriesJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

    }
}