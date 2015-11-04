<?php

namespace You\BookingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use JMS\Serializer\SerializationContext;

/**
 * @Route("/json/list")
 */
class ListJSONController extends Controller
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
     * @Route("/clinics", name="json_list_clinics")
     * @param Request $request
     * @return Response
     */
    public function listClinicAction(Request $request)
    {
        $clinicManager = $this->container->get("youbookingbundle.clinic_manager");

        $clinics = $clinicManager->findAllClinics();

        $clinicsJSON = $this->serializer->serialize($clinics, "json");

        $response = new Response($clinicsJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/services", name="json_list_services")
     * @param Request $request
     * @return Response
     */
    public function listServiceAction(Request $request)
    {
        $serviceManager = $this->container->get("youbookingbundle.service_manager");

        $services = $serviceManager->findAllServices();

        $servicesJSON = $this->serializer->serialize($services, "json");

        $response = new Response($servicesJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/categories", name="json_list_categories")
     * @param Request $request
     * @return Response
     */
    public function listCategoryAction(Request $request)
    {
        $categoryManager = $this->container->get("youbookingbundle.category_manager");

        $categories = $categoryManager->findAllCategories();

        $categoriesJSON = $this->serializer->serialize($categories, 'json', SerializationContext::create()->setGroups(array('list-category')));

        $response = new Response($categoriesJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/doctors", name="json_list_doctors")
     * @param Request $request
     * @return Response
     */
    public function listDoctorAction(Request $request)
    {
        $doctorManager = $this->container->get("youbookingbundle.doctor_manager");

        $doctors = $doctorManager->findAllDoctors();

        $doctorsJSON = $this->serializer->serialize($doctors, "json");

        $response = new Response($doctorsJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/images", name="json_list_images")
     * @param Request $request
     * @return Response
     */
    public function listImageAction(Request $request)
    {
        $images = $this->getDoctrine()->getRepository("You\BookingBundle\Entity\Image")->findAll();

        $imagesJSON = $this->serializer->serialize($images, "json");

        $response = new Response($imagesJSON);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}