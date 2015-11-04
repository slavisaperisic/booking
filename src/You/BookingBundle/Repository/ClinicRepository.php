<?php

namespace You\BookingBundle\Repository;

use Doctrine\ORM\EntityRepository;
use You\BookingBundle\Entity\Clinic;

/**
 * Class ClinicRepository
 *
 * @package You/BookingBundle/Entity/Repository
 */
class ClinicRepository extends EntityRepository
{

    /**
     * @return string
     */
    protected function getAlias()
    {
        return 'clinic';
    }

    /**
     * @param Clinic $clinic
     * @return Clinic
     */
    public function saveClinic(Clinic $clinic) {

        $em = $this->getEntityManager();
        $em->persist($clinic);
        $em->flush();

        return $clinic;
    }

    /**
     * @param Clinic $clinic
     * @return Clinic
     */
    public function editClinic(Clinic $clinic) {

        $em = $this->getEntityManager();
        $em->merge($clinic);
        $em->flush();

        return $clinic;
    }

    /**
     * @param Clinic $clinic
     * @return Clinic
     */
    public function removeClinic(Clinic $clinic) {

        $em = $this->getEntityManager();
        $em->remove($clinic);
        $em->flush();

        return $clinic;
    }

}