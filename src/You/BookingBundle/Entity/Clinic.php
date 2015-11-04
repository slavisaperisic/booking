<?php

namespace You\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Clinic
 *
 * @ORM\Table(name="Clinic", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="You\BookingBundle\Repository\ClinicRepository")
 */
class Clinic
{

    /**
     * @var integer
     * @JMS\Type("integer")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     * @JMS\Type("string")
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @ORM\Column(name="workinghours", type="string", length=80, nullable=false)
     */
    private $workingHours;

    /**
     * @ORM\OneToOne(targetEntity="You\BookingBundle\Entity\Image", cascade={"all"})
     * @JMS\Type("You\BookingBundle\Entity\Image")
     **/
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="clinic")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     **/
    private $addresses;

    /**
     * @@ORM\ManyToMany(targetEntity="Doctor", mappedBy="clinics")
     **/
    private $doctors;

    /**
     * @@ORM\OneToOne(targetEntity="Profile", mappedBy="clinic")
     **/
    private $profile;

    /**
     * @ORM\OneToMany(targetEntity="ClinicService", mappedBy="clinic")
     **/
    private $clinicservices;

    /**
     *
     */
    public function __construct() {
        $this->addresses = new ArrayCollection();
        $this->doctors = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getAddresses()
    {
        return $this->addresses;
    }

    /**
     * @param mixed $addresses
     */
    public function setAddresses($addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * @return mixed
     */
    public function getDoctors()
    {
        return $this->doctors;
    }

    /**
     * @param mixed $doctors
     */
    public function setDoctors($doctors)
    {
        $this->doctors = $doctors;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    /**
     * @return mixed
     */
    public function getClinicservices()
    {
        return $this->clinicservices;
    }

    /**
     * @param mixed $clinicservices
     */
    public function setClinicservices($clinicservices)
    {
        $this->clinicservices = $clinicservices;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Clinic
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Clinic
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set workingHours
     *
     * @param string $workingHours
     *
     * @return Clinic
     */
    public function setWorkingHours($workingHours)
    {
        $this->workingHours = $workingHours;

        return $this;
    }

    /**
     * Get workingHours
     *
     * @return string
     */
    public function getWorkingHours()
    {
        return $this->workingHours;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
