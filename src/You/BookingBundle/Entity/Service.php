<?php

namespace You\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;

/**
 * Service
 *
 * @ORM\Table(name="Service")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="You\BookingBundle\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;

    /**
     * @var string
     * @JMS\Type("string")
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="ClinicService", mappedBy="service")
     **/
    private $clinicservices;

    /**
     * @ORM\OneToMany(targetEntity="Reservation", mappedBy="service")
     **/
    private $reservations;

    /**
     * @JMS\Type("ArrayCollection<You\BookingBundle\Entity\Category>")
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="services")
     * @JMS\Exclude
     **/
    private $categories;

    /**
     * @param $description
     * @param $name
     */
    public function __construct($description, $name)
    {
        $this->description = $description;
        $this->name = $name;
        $this->categories = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->clinicservices = new ArrayCollection();
    }

    /**
     * Add categories
     *
     * @param Category $category
     *
     * @return Service
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     *
     */
    public function removeCategories()
    {
        $this->categories = null;
    }


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Service
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
     * Set id
     *
     * @param integer $id
     *
     * @return Service
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Service
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
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return mixed
     */
    public function getReservations()
    {
        return $this->reservations;
    }

    /**
     * @param mixed $reservations
     */
    public function setReservations($reservations)
    {
        $this->reservations = $reservations;
    }


}
