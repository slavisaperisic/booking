<?php

namespace You\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="Category", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="You\BookingBundle\Repository\CategoryRepository")
 */
class Category
{

    /**
     * @var integer
     * @JMS\Type("integer")
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @JMS\Groups({"list-category"})
     */
    private $id;

    /**
     * @var string
     * @JMS\Type("string")
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     * @JMS\Groups({"list-category"})
     */
    private $name;

    /**
     * @JMS\Type("You\BookingBundle\Entity\Service")
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="categories")
     * @ORM\JoinTable(name="categories_services")
     * @JMS\MaxDepth(2)
     **/
    private $services;

    /**
     * @JMS\Exclude
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
     **/
    private $children;

    /**
     * @JMS\Type("ArrayCollection<You\BookingBundle\Entity\Category>")
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children", cascade={"persist"})
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     **/
    private $parent;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->services = new ArrayCollection();
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
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param mixed $services
     */
    public function setServices($services)
    {
        $this->services = $services;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @param Service $service
     */
    public function addService(Service $service)
    {
        $this->services[] = $service;
        $service->addCategory($this);
    }

    /**
     * Remove services
     *
     * @param Service $service
     */
    public function removeService(Service $service)
    {
        $this->services->removeElement($service);
        $service->removeCategory($this);
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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


}