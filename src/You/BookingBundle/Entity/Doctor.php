<?php

namespace You\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Doctor
 *
 * @ORM\Table(name="Doctor", uniqueConstraints={@ORM\UniqueConstraint(name="fullname", columns={"fullname"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="You\BookingBundle\Repository\DoctorRepository")
 */
class Doctor
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
     * @JMS\Type("string")
     * @ORM\Column(name="fullname", type="string", length=100, nullable=false)
     */
    private $fullname;

    /**
     * @var string
     * @JMS\Type("string")
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @JMS\Type("You\BookingBundle\Entity\Clinic")
     * @ORM\ManyToMany(targetEntity="Clinic", inversedBy="doctors")
     * @ORM\JoinTable(name="DoctorsClinics")
     **/
    private $clinics;

    /**
     * @JMS\Type("ArrayCollection<You\BookingBundle\Entity\Image>")
     * @ORM\OneToMany(targetEntity="Image", mappedBy="doctor")
     **/
    private $images;

    /**
     * @ORM\OneToOne(targetEntity="Profile", mappedBy="doctor")
     **/
    private $profile;

    public function __construct() {
        $this->clinics = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getClinics()
    {
        return $this->clinics;
    }

    /**
     * @param mixed $clinics
     */
    public function setClinics($clinics)
    {
        $this->clinics = $clinics;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param $images
     * @return $this
     */
    public function setImages($images)
    {
        $this->images = $images;
        return $this;
    }

    /**
     *
     */
    public function removeImages()
    {
        $this->images = null;
    }

    /**
     * @param Image $image
     */
    public function addImage(Image $image)
    {
        $this->images[] = $image;
    }

    /**
     * Remove images
     *
     * @param Image $image
     */
    public function removeImage(Image $image)
    {
        $this->images->removeElement($image);
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
     * Set fullname
     *
     * @param string $fullname
     *
     * @return Doctor
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Doctor
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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
