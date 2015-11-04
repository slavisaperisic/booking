<?php

namespace You\BookingBundle\Manager;

use You\BookingBundle\Entity\Service;
use You\BookingBundle\Repository\ServiceRepository;

class ServiceManager
{

    /**
     * @var ServiceRepository
     */
    protected $repository;

    /**
     * @param ServiceRepository $repository
     */
    public function __construct(ServiceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return Service
     */
    public function findService($id) {
        return $this->repository->findOneById($id);
    }

    /**
     * @param Service $service
     */
    public function saveService(Service $service)
    {
        //@TODO $this->serviceContainer->prepareSaveService($service);
        $this->repository->saveService($service);
    }

    /**
     * @param $service_id
     * @return null|object
     */
    public function getService($service_id) {
        return $this->repository->find($service_id);
    }

    /**
     * @param Service $service
     * @return Service
     */
    public function removeService(Service $service) {
        return $this->repository->removeService($service);
    }

    /**
     * @return array
     */
    public function findAllServices() {
        return $this->repository->findAll();
    }


}