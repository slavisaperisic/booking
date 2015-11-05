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
 * @Route("/json/edit")
 */
class EditJSONController extends Controller
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
     * @param $request
     * @return Response
     *
     * @Route("/clinic/{id}", name="json_edit_clinic")
     */
    public function editClinicAction(Request $request, $id)
    {

        $clinicManager = $this->container->get("youbookingbundle.clinic_manager");
        $clinicClassObject = $this->serializer->deserialize($request->getContent(), "You\BookingBundle\Entity\Clinic", "json");

        $newClinic = $clinicManager->editClinic($clinicClassObject);

        $clinicJSON = $this->serializer->serialize($newClinic, "json");

        $response = new Response($clinicJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
