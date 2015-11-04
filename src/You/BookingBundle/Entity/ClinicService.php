<?php

namespace You\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * ClinicService
 *
 * @ORM\Table(name="ClinicService")
 * @ORM\Entity
 */
class ClinicService
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="clinicservices")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     **/
    private $service;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Clinic", inversedBy="clinicservices")
     * @ORM\JoinColumn(name="clinic_id", referencedColumnName="id")
     **/
    private $clinic;



}