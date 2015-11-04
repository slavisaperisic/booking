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
 * @Route("/json")
 */
class JSONController extends Controller
{
    private $serializer;
    private $uploader;

    /**
     * JSONController constructor.
     */
    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
        $this->uploader = new Uploader();
    }

    /**
     * @Route("/insert/clinic", name="json_insert_clinic")
     * @param Request $request
     * @return Response
     */
    public function insertClinicAction(Request $request)
    {
        $clinicManager = $this->container->get("youbookingbundle.clinic_manager");
        $clinicClassObject = $this->serializer->deserialize($request->getContent(), "You\BookingBundle\Entity\Clinic", "json");

        if ($clinicClassObject->getImage() != "")
            $this->uploader->uploadBase64File($clinicClassObject->getImage());

        $clinicManager->saveClinic($clinicClassObject);

        $clinicResponse = $this->serializer->serialize($clinicClassObject, "json");
        return new Response($clinicResponse);
    }

    /**
     * @Route("/insert/doctor", name="json_insert_doctor")
     * @param Request $request
     * @return Response
     */
    public function insertDoctorAction(Request $request)
    {
        $doctorManager = $this->container->get("youbookingbundle.doctor_manager");
        $doctorClassObject = $this->serializer->deserialize($request->getContent(), "You\BookingBundle\Entity\Doctor", "json");

        if ($doctorClassObject->getImage() != "")
            $this->uploader->uploadBase64File($doctorClassObject->getImage());

        $doctorManager->saveDoctor($doctorClassObject);

        $doctorResponse = $this->serializer->serialize($doctorClassObject, "json");
        return new Response($doctorResponse);
    }

    /**
     * @Route("/insert/service", name="json_insert_service")
     * @param Request $request
     * @return Response
     */
    public function insertServiceAction(Request $request)
    {
        $serviceManager = $this->container->get("youbookingbundle.service_manager");
        $categoryManager = $this->container->get("youbookingbundle.category_manager");

        $serviceClassObject = $this->serializer->deserialize($request->getContent(), "You\BookingBundle\Entity\Service", "json");

        $categoriesAll = $serviceClassObject->getCategories();
        $serviceClassObject->removeCategories();

        foreach ($categoriesAll as $category) {
            $existingCategory = $categoryManager->findCategory($category->getId());
            $existingCategory->addService($serviceClassObject);
        }

        $serviceManager->saveService($serviceClassObject);

        $serviceResponse = $this->serializer->serialize($serviceClassObject, "json");
        return new Response($serviceResponse);
    }

    /**
     * @Route("/insert/category", name="json_insert_category")
     * @param Request $request
     * @return Response
     */
    public function insertCategoryAction(Request $request)
    {
        $categoryManager = $this->container->get("youbookingbundle.category_manager");
        $categoryClassObject = $this->serializer->deserialize($request->getContent(), "You\BookingBundle\Entity\Category", "json");

        $categoryManager->saveCategory($categoryClassObject);

        $categoryResponse = $this->serializer->serialize($categoryClassObject, "json");
        return new Response($categoryResponse);
    }

}
