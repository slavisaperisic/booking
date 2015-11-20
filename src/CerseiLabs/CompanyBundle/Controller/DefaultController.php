<?php

namespace CerseiLabs\CompanyBundle\Controller;

use CerseiLabs\CompanyBundle\Helper\FormCreator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/companyadmin")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="company_dashboard")
     */
    public function adminAction()
    {
        return $this->render("@cerseilabstemplatedir/Page/home.html.twig");
    }

    /**
     * @Route("/invoice/new", name="new_invoice")
     */
    public function newInvoiceAction()
    {
        $formElements = new FormCreator();

        $options = $this->container->get("youbookingbundle.doctor_manager")->findAllDoctors();

        $_field_owningCompany = array(
            "type" => "select",
            "id" => "owning_company",
            "classes" => "form-control",
            "args" => $options
        );

        $_field_Bank = array(
            "type" => "text",
            "id" => "bank",
            "classes" => "form-control"
        );

        $formElements->addField($_field_owningCompany);
        $formElements->addField($_field_Bank);

        $formElementsHTML = $formElements->HTMLize();

        //print_r($formElements);exit;

        return $this->render("@cerseilabstemplatedir/Page/invoice.html.twig", array("formElementsHTML" => $formElementsHTML));
    }

    /**
     * @Route("/invoice/edit/{id}", name="edit_invoice")
     */
    public function editInvoiceAction()
    {
        return $this->render("@cerseilabstemplatedir/Page/invoice.html.twig");
    }

    /**
     * @Route("/invoice/list", name="list_invoices")
     */
    public function listInvoiceAction()
    {
        return $this->render("@cerseilabstemplatedir/List/invoices.html.twig");
    }

    /**
     * @Route("/task-management", name="task_management")
     */
    public function newTaskAction()
    {
        return $this->render("@cerseilabstemplatedir/Page/task.html.twig");
    }

}
