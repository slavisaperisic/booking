<?php

namespace You\BookingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Util\Debug;

class FrontController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function adminAction()
    {
        $categoryManager = $this->container->get("youbookingbundle.category_manager");

        $categories = $categoryManager->findAllCategories();

        $services = array();

        foreach ($categories as $category) {
            $services[] = array(
                "catname" => $category->getName(),
                "services" => $category->getServices()
            );
            //[$category->getName()] = $category->getServices();
        }

        //Debug::dump($services);exit;

        return $this->render("@templatedir/Frontend/index.html.twig",
            array(
                "services"  =>  $services
            )
        );
    }
}