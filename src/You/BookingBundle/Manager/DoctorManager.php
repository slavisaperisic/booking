<?php

namespace You\BookingBundle\Manager;

use You\BookingBundle\Entity\Doctor;
use You\BookingBundle\Repository\DoctorRepository;

class DoctorManager
{

    /**
     * @var DoctorRepository
     */
    protected $repository;

    /**
     * @param DoctorRepository $repository
     */
    public function __construct(DoctorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return Doctor
     */
    public function findDoctor($id) {
        return $this->repository->findOneById($id);
    }

    /**
     * @param Doctor $doctor
     */
    public function saveDoctor(Doctor $doctor)
    {
        //@TODO $this->doctorContainer->prepareSaveDoctor($doctor);
        $this->repository->saveDoctor($doctor);
    }

    /**
     * @param $doctor_id
     * @return null|object
     */
    public function getDoctor($doctor_id) {
        return $this->repository->find($doctor_id);
    }

    /**
     * @param Doctor $doctor
     * @return Doctor
     */
    public function removeDoctor(Doctor $doctor) {
        return $this->repository->removeDoctor($doctor);
    }

    /**
     * @return array
     */
    public function findAllDoctors() {
        return $this->repository->findAll();
    }


}