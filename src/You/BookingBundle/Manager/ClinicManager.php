<?php

namespace You\BookingBundle\Manager;

use You\BookingBundle\Entity\Clinic;
use You\BookingBundle\Repository\ClinicRepository;
use Doctrine\Common\Util\Debug;

class ClinicManager
{

    /**
     * @var ClinicRepository
     */
    protected $repository;

    /**
     * @param ClinicRepository $repository
     */
    public function __construct(ClinicRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return Clinic
     */
    public function findClinic($id) {
        return $this->repository->findOneById($id);
    }

    /**
     * @param Clinic $clinic
     */
    public function saveClinic(Clinic $clinic)
    {
        //@TODO $this->clinicContainer->prepareSaveClinic($clinic);
        $this->repository->saveClinic($clinic);
    }

    /**
     * @param Clinic $clinic
     */
    public function editClinic(Clinic $clinic) {
        $this->repository->editClinic($clinic);
    }

    /**
     * @param $clinic_id
     * @return null|object
     */
    public function getClinic($clinic_id) {
        return $this->repository->find($clinic_id);
    }

    /**
     * @param Clinic $clinic
     * @return Clinic
     */
    public function removeClinic(Clinic $clinic) {
        return $this->repository->removeClinic($clinic);
    }

    /**
     * @return array
     */
    public function findAllClinics() {
        return $this->repository->findAll();
    }


}