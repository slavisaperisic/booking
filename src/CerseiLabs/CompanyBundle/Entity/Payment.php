<?php

namespace CerseiLabs\CompanyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
use Gedmo\Mapping\Annotation as GDM;

/**
 * Address
 *
 * @ORM\Table(name="Payment")
 * @ORM\Entity
 */
class Payment
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
     * @ORM\Column(name="payment_number", type="string", length=60, nullable=true)
     */
    private $paymentNbr;

    /**
     * @var DateTime
     * @GDM\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $dateReceived;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime")
     */
    private $datePaid;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="paymentForOwningCompany")
     * @ORM\JoinColumn(name="owning_company_id", referencedColumnName="id")
     **/
    private $owningCompanies;

    /**
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="paymentForPayingCompany")
     * @ORM\JoinColumn(name="paying_company_id", referencedColumnName="id")
     **/
    private $payingCompanies;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_location", type="string", length=200, nullable=true)
     */
    private $paymentLocation;

    /**
     * @ORM\OneToMany(targetEntity="Service", mappedBy="payment")
     **/
    private $services;

    /**
     * @var string
     *
     * @ORM\Column(name="notice", type="string", length=200, nullable=true)
     */
    private $notice;

    /**
     * @param $paymentNbr
     * @param $dateReceived
     * @param $datePaid
     * @param $owningCompanies
     * @param $payingCompanies
     * @param $services
     * @param $paymentLocation
     * @param $notice
     */
    public function __construct($paymentNbr, $dateReceived, $datePaid, $owningCompanies, $payingCompanies, $services, $paymentLocation, $notice)
    {
        $this->paymentNbr = $paymentNbr;
        $this->dateReceived = $dateReceived;
        $this->datePaid = $datePaid;
        $this->owningCompanies = new ArrayCollection();
        $this->payingCompanies = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->paymentLocation = $paymentLocation;
        $this->notice = $notice;
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
    public function getPaymentNbr()
    {
        return $this->paymentNbr;
    }

    /**
     * @param string $paymentNbr
     */
    public function setPaymentNbr($paymentNbr)
    {
        $this->paymentNbr = $paymentNbr;
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
     * @return mixed
     */
    public function getOwningCompanies()
    {
        return $this->owningCompanies;
    }

    /**
     * @param mixed $owningCompanies
     */
    public function setOwningCompanies($owningCompanies)
    {
        $this->owningCompanies = $owningCompanies;
    }

    /**
     * @return mixed
     */
    public function getPayingCompanies()
    {
        return $this->payingCompanies;
    }

    /**
     * @param mixed $payingCompanies
     */
    public function setPayingCompanies($payingCompanies)
    {
        $this->payingCompanies = $payingCompanies;
    }

    /**
     * @return string
     */
    public function getPaymentLocation()
    {
        return $this->paymentLocation;
    }

    /**
     * @param string $paymentLocation
     */
    public function setPaymentLocation($paymentLocation)
    {
        $this->paymentLocation = $paymentLocation;
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


}