<?php

namespace CerseiLabs\CompanyBundle\Controller;

use CerseiLabs\CompanyBundle\Entity\Payment;
use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package You\BookingBundle\Controller
 */
class CompanyController extends Controller
{

    /**
     * @Route("/company", name="companyyy")
     */
    public function companyAction()
    {

        $payment = new Payment("01-12", new \DateTime(), new \DateTime(), null, null, null, "Beograd", "situacija sto pre");

        $em = $this->getDoctrine()->getManager("company");

        $em->persist($payment);
        $em->flush();

        return new Response("empty");
    }

}