<?php

namespace CerseiLabs\CompanyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Gedmo\Mapping\Annotation as GDM;

/**
 * Address
 *
 * @ORM\Table(name="Invoice")
 * @ORM\Entity
 */
class Invoice
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
     * @ORM\Column(name="Invoice_number", type="string", length=60, nullable=true)
     */
    private $InvoiceNbr;

    /**
     * @var DateTime
     * @GDM\Timestampable(on="create")
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateReceived;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datePaid;

    /**
     * @ORM\OneToOne(targetEntity="Company", inversedBy="InvoiceForOwningCompany")
     * @ORM\JoinColumn(name="owning_company_id", referencedColumnName="id")
     **/
    private $owningCompany;

    /**
     * @ORM\OneToOne(targetEntity="Company", inversedBy="InvoiceForPayingCompany")
     * @ORM\JoinColumn(name="paying_company_id", referencedColumnName="id")
     **/
    private $payingCompany;

    /**
     * @var string
     *
     * @ORM\Column(name="Invoice_location", type="string", length=200, nullable=true)
     */
    private $InvoiceLocation;

    /**
     * @ORM\ManyToOne(targetEntity="Service", inversedBy="invoice")
     * @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     **/
    private $service;

    /**
     * @var string
     *
     * @ORM\Column(name="notice", type="string", length=200, nullable=true)
     */
    private $notice;

    /**
     * @param $InvoiceNbr
     * @param DateTime $dateReceived
     * @param DateTime $datePaid
     * @param $owningCompany
     * @param $payingCompany
     * @param $InvoiceLocation
     * @param $notice
     * @param $service
     */
    public function __construct($InvoiceNbr, DateTime $dateReceived, DateTime $datePaid, $owningCompany, $payingCompany, $InvoiceLocation, $notice, $service)
    {
        $this->InvoiceNbr = $InvoiceNbr;
        $this->dateReceived = $dateReceived;
        $this->datePaid = $datePaid;
        $this->owningCompany = $owningCompany;
        $this->payingCompany = $payingCompany;
        $this->InvoiceLocation = $InvoiceLocation;
        $this->notice = $notice;
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getPayingCompany()
    {
        return $this->payingCompany;
    }

    /**
     * @param mixed $payingCompany
     */
    public function setPayingCompany($payingCompany)
    {
        $this->payingCompany = $payingCompany;
    }

    /**
     * @return mixed
     */
    public function getOwningCompany()
    {
        return $this->owningCompany;
    }

    /**
     * @param mixed $owningCompany
     */
    public function setOwningCompany($owningCompany)
    {
        $this->owningCompany = $owningCompany;
    }

    /**
     * @return string
     */
    public function getNotice()
    {
        return $this->notice;
    }

    /**
     * @param string $notice
     */
    public function setNotice($notice)
    {
        $this->notice = $notice;
    }

    /**
     * @return string
     */
    public function getInvoiceNbr()
    {
        return $this->InvoiceNbr;
    }

    /**
     * @param string $InvoiceNbr
     */
    public function setInvoiceNbr($InvoiceNbr)
    {
        $this->InvoiceNbr = $InvoiceNbr;
    }

    /**
     * @return DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param DateTime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return DateTime
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * @param DateTime $dateReceived
     */
    public function setDateReceived($dateReceived)
    {
        $this->dateReceived = $dateReceived;
    }

    /**
     * @return DateTime
     */
    public function getDatePaid()
    {
        return $this->datePaid;
    }

    /**
     * @param DateTime $datePaid
     */
    public function setDatePaid($datePaid)
    {
        $this->datePaid = $datePaid;
    }

    /**
     * @return string
     */
    public function getInvoiceLocation()
    {
        return $this->InvoiceLocation;
    }

    /**
     * @param string $InvoiceLocation
     */
    public function setInvoiceLocation($InvoiceLocation)
    {
        $this->InvoiceLocation = $InvoiceLocation;
    }

    /**
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
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

}