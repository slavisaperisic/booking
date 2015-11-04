<?php

namespace You\BookingBundle\Repository;

use Doctrine\ORM\EntityRepository;
use You\BookingBundle\Entity\Doctor;

/**
 * Class DoctorRepository
 *
 * @package You/BookingBundle/Entity/Repository
 */
class DoctorRepository extends EntityRepository
{

    /**
     * @return string
     */
    protected function getAlias()
    {
        return 'doctor';
    }

    /**
     * @param Doctor $doctor
     * @return Doctor
     */
    public function saveDoctor(Doctor $doctor) {

        $em = $this->getEntityManager();
        $em->persist($doctor);
        $em->flush();

        return $doctor;
    }

    /**
     * @param Doctor $doctor
     * @return Doctor
     */
    public function removeDoctor(Doctor $doctor) {

        $em = $this->getEntityManager();
        $em->remove($doctor);
        $em->flush();

        return $doctor;
    }

}