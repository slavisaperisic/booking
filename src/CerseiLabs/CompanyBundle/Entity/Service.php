<?php

namespace CerseiLabs\CompanyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="Service")
 * @ORM\Entity
 */
class Service
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
     *
     * @ORM\Column(name="service_name", type="string", length=300, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="service_category", type="string", length=300, nullable=true)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=20, nullable=true)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="price_in_letters", type="string", length=100, nullable=true)
     */
    private $priceInLetters;

    /**
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="services")
     **/
    private $invoices;

    /**
     * @param $name
     * @param $category
     * @param $price
     * @param $priceInLetters
     */
    public function __construct($name, $category, $price, $priceInLetters)
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->priceInLetters = $priceInLetters;
        $this->invoices = new ArrayCollection();
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPriceInLetters()
    {
        return $this->priceInLetters;
    }

    /**
     * @param string $priceInLetters
     */
    public function setPriceInLetters($priceInLetters)
    {
        $this->priceInLetters = $priceInLetters;
    }

    /**
     * @return mixed
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @param mixed $invoices
     */
    public function setInvoices($invoices)
    {
        $this->invoices = $invoices;
    }

}