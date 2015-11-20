<?php

namespace CerseiLabs\CompanyBundle\Controller;

use CerseiLabs\CompanyBundle\Entity\Address;
use CerseiLabs\CompanyBundle\Entity\Company;
use CerseiLabs\CompanyBundle\Entity\Invoice;
use CerseiLabs\CompanyBundle\Entity\Service;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package CerseiLabs\CompanyBundle\Controller
 * @Route("/invoice")
 */
class CompanyController extends Controller
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
     * @Route("/add_new_address", name="add_new_address")
     */
    public function addressAction()
    {
        //$address = new Address("Bulevar Kralja Petra I, broj 21");
        $address = new Address("Stjepana Supanca 46/38, Zeleznik");

        $em = $this->getDoctrine()->getManager("company");

        $em->persist($address);
        $em->flush();

        return new Response(200);
    }

    /**
     * @Route("/add_new_company/address-{addressid}", name="add_new_company")
     */
    public function companyAction($addressid)
    {
        $em = $this->getDoctrine()->getManager("company");

        $existingAddress = $em->getRepository("CerseiLabsCompanyBundle:Address")->findOneById($addressid);

        /**
         * Company constructor.
         * @param string $companyName
         * @param $addresses
         * @param int $PIB
         * @param int $personalNumber
         * @param int $industryCode
         * @param string $companyEmail
         */
        $company = new Company("Cersei Labs", $existingAddress, 98765422, 63434345, 6201, "slavisa@fsd.rs");

        $em->persist($company);
        $em->flush();

        return new Response(200);
    }

    /**
     * @Route("/add_new_service", name="add_new_service")
     */
    public function serviceAction()
    {
        $em = $this->getDoctrine()->getManager("company");

        $service = new Service("izrada UML modela", "Database Development", 195000, "stotinudevedesetpethiljadadinara");

        $em->persist($service);
        $em->flush();

        return new Response(200);
    }

    /**
     * @param $owningCompanyId
     * @param $payingCompanyId
     * @param $serviceId
     * @return Response
     *
     * @Route("/add_new_invoice/{owningCompanyId}/{payingCompanyId}/service-{serviceId}", name="add_new_invoice")
     */
    public function invoiceAction($owningCompanyId, $payingCompanyId, $serviceId)
    {
        $em = $this->getDoctrine()->getManager("company");

        $owningCompany = $em->getRepository("CerseiLabsCompanyBundle:Company")->findOneById($owningCompanyId);
        $payingCompany = $em->getRepository("CerseiLabsCompanyBundle:Company")->findOneById($payingCompanyId);
        $servicePaid = $em->getRepository("CerseiLabsCompanyBundle:Service")->findOneById($serviceId);

        $invoice = new Invoice("02-15", new \DateTime(), new \DateTime(), $owningCompany, $payingCompany, "Beograd", "Platiti u najkracem roku, po vidjenju fakture", $servicePaid);

        $em->persist($invoice);
        $em->flush();

        return new Response(200);
    }

    /**
     * @Route("/json/insert/task", name="json_insert_task")
     * @param Request $request
     * @return Response
     */
    public function insertTaskAction(Request $request)
    {


        $taskClassObject = $this->serializer->deserialize($request->getContent(), "CerseiLabs\CompanyBundle\Entity\Task", "json");

        $this->getDoctrine()->getEntityManager("company")->persist($taskClassObject);
        $this->getDoctrine()->getEntityManager("company")->flush();

        $tasks = $this->getDoctrine()->getManager("company")->getRepository("CerseiLabsCompanyBundle:Task")->findBy([], ['id' => 'DESC']);

        $tasksResponse = $this->serializer->serialize($tasks, "json");
        return new Response($tasksResponse);
    }

    /**
     * @Route("/json/list/task", name="json_list_task")
     * @return Response
     */
    public function listTaskAction()
    {

        $tasks = $this->getDoctrine()->getManager("company")->getRepository("CerseiLabsCompanyBundle:Task")->findBy([], ['id' => 'DESC']);

        $taskResponse = $this->serializer->serialize($tasks, "json");
        return new Response($taskResponse);
    }

    /**
     * @Route("/json/edit/task/{taskid}", name="json_edit_task")
     * @return Response
     */
    public function editTaskAction($taskid)
    {

        $taskToEdit = $this->getDoctrine()->getManager("company")->getRepository("CerseiLabsCompanyBundle:Task")->findOneById($taskid);
        $taskToEdit->setStatus(1);
        $this->getDoctrine()->getEntityManager("company")->flush();

        $taskResponse = $this->serializer->serialize($taskToEdit, "json");
        return new Response($taskResponse);
    }

}