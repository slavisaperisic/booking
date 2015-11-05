<?php

namespace You\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Image
 *
 * @ORM\Table(name="Image")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="You\BookingBundle\Repository\ImageRepository")
 */
class Image
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="imagename", type="string", length=50, nullable=true)
     * @JMS\Type("string")
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     */
    private $base64Content = null;

    /**
     * @JMS\Type("You\BookingBundle\Entity\Doctor")
     * @ORM\ManyToOne(targetEntity="Doctor", inversedBy="images")
     * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
     **/
    private $doctor;

    /**
     * Image constructor.
     * @param $name
     * @param string $base64Content
     */
    public function __construct($name, $base64Content)
    {
        $this->name = $name;
        $this->base64Content = $base64Content;
    }

    /**
     * @return mixed
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * @param mixed $doctor
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getBase64Content()
    {
        return $this->base64Content;
    }

    /**
     * @param string $base64Content
     */
    public function setBase64Content($base64Content)
    {
        $this->base64Content = $base64Content;
    }



}