<?php

namespace You\BookingBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use You\BookingBundle\Entity\Uploader;
use Doctrine\Common\Util\Debug;
use You\BookingBundle\Entity\Service;

/**
 * @Route("/json/get")
 */
class GetJSONController extends Controller
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
     * @param $id
     * @return Response
     *
     * @Route("/clinic/{id}", name="json_get_clinic")
     */
    public function getClinicAction($id)
    {

        $clinicManager = $this->container->get("youbookingbundle.clinic_manager");

        $clinic = $clinicManager->findClinic($id);

        $clinicJSON = $this->serializer->serialize($clinic, "json");

        $response = new Response($clinicJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}