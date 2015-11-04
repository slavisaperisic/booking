<?php

namespace You\BookingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class DefaultController extends Controller
{

    /**
     * @Route("/", name="dashboard")
     */
    public function adminAction()
    {
        return $this->render("@templatedir/Page/home.html.twig");
    }

    /**
     * @Route("/clinic/new", name="new_clinic")
     */
    public function newClinicAction()
    {
        return $this->render("@templatedir/Page/clinic.html.twig");
    }

        /**
         * @Route("/clinic/edit/{id}", name="edit_clinic")
         */
        public function editClinicAction($id)
        {
            return $this->render("@templatedir/Page/clinic.html.twig",
                array(
                    "edit" => true,
                    "id"   => $id
                )
            );
        }

            /**
             * @Route("/clinic/list", name="list_clinics")
             */
            public function listClinicAction()
            {
                return $this->render("@templatedir/List/clinics.html.twig");
            }

    /**
     * @Route("/doctor/new", name="new_doctor")
     */
    public function newDoctorAction()
    {
        return $this->render("@templatedir/Page/doctor.html.twig");
    }

        /**
         * @Route("/doctor/edit/{id}", name="edit_doctor")
         */
        public function editDoctorAction()
        {
            return $this->render("@templatedir/Page/doctor.html.twig");
        }
        
            /**
             * @Route("/doctor/list", name="list_doctors")
             */
            public function listDoctorAction()
            {
                return $this->render("@templatedir/List/doctors.html.twig");
            }

    /**
     * @Route("/service/new", name="new_service")
     */
    public function newServiceAction()
    {
        return $this->render("@templatedir/Page/service.html.twig");
    }
        /**
         * @Route("/service/edit/{id}", name="edit_service")
         */
        public function editServiceAction()
        {
            return $this->render("@templatedir/Page/service.html.twig");
        }
    
            /**
             * @Route("/service/list", name="list_services")
             */
            public function listServiceAction()
            {
                return $this->render("@templatedir/List/services.html.twig");
            }

    /**
     * @Route("/category/new", name="new_category")
     */
    public function newCategoryAction()
    {
        return $this->render("@templatedir/Page/category.html.twig");
    }

        /**
         * @Route("/category/edit/{id}", name="edit_category")
         */
        public function editCategoryAction()
        {
            return $this->render("@templatedir/Page/category.html.twig");
        }

            /**
             * @Route("/category/list", name="list_categories")
             */
            public function listCategoryAction()
            {
                return $this->render("@templatedir/List/categories.html.twig");
            }

}
