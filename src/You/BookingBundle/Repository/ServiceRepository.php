<?php

namespace You\BookingBundle\Repository;

use Doctrine\ORM\EntityRepository;
use You\BookingBundle\Entity\Service;

/**
 * Class ServiceRepository
 *
 * @package You/BookingBundle/Entity/Repository
 */
class ServiceRepository extends EntityRepository
{

    /**
     * @return string
     */
    protected function getAlias()
    {
        return 'service';
    }

    /**
     * @param Service $service
     * @return Service
     */
    public function saveService(Service $service) {

        $em = $this->getEntityManager();
        $em->persist($service);
        $em->flush();

        return $service;
    }

    /**
     * @param Service $service
     * @return Service
     */
    public function removeService(Service $service) {

        $em = $this->getEntityManager();
        $em->remove($service);
        $em->flush();

        return $service;
    }

}