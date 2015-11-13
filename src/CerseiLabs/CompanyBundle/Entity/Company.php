<?php

namespace CerseiLabs\CompanyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Address
 *
 * @ORM\Table(name="Company")
 * @ORM\Entity
 */
class Company
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
     * @ORM\Column(name="company_name", type="string", length=300, nullable=false)
     */
    private $companyName;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="company")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     **/
    private $addresses;

    /**
     * @var integer
     *
     * @ORM\Column(name="pib", type="integer", length=10, nullable=false)
     */
    private $PIB;

    /**
     * @var integer
     *
     * @ORM\Column(name="personal_number", type="integer", length=10, nullable=false)
     */
    private $personalNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="industry_code", type="integer", length=4, nullable=false)
     */
    private $industryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="company_email", type="string", length=60, nullable=true)
     */
    private $companyEmail;

    /**
     * @ORM\OneToOne(targetEntity="Invoice", mappedBy="owningCompany")
     **/
    private $invoiceForOwningCompany;

    /**
     * @ORM\OneToOne(targetEntity="Invoice", mappedBy="payingCompany")
     **/
    private $invoiceForPayingCompany;

    /**
     * Company constructor.
     * @param string $companyName
     * @param $addresses
     * @param int $PIB
     * @param int $personalNumber
     * @param int $industryCode
     * @param string $companyEmail
     */
    public function __construct($companyName, $addresses, $PIB, $personalNumber, $industryCode, $companyEmail)
    {
        $this->companyName = $companyName;
        $this->addresses = $addresses;
        $this->PIB = $PIB;
        $this->personalNumber = $personalNumber;
        $this->industryCode = $industryCode;
        $this->companyEmail = $companyEmail;
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
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
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
     * @return int
     */
    public function getPIB()
    {
        return $this->PIB;
    }

    /**
     * @param int $PIB
     */
    public function setPIB($PIB)
    {
        $this->PIB = $PIB;
    }

    /**
     * @return int
     */
    public function getPersonalNumber()
    {
        return $this->personalNumber;
    }

    /**
     * @param int $personalNumber
     */
    public function setPersonalNumber($personalNumber)
    {
        $this->personalNumber = $personalNumber;
    }

    /**
     * @return int
     */
    public function getIndustryCode()
    {
        return $this->industryCode;
    }

    /**
     * @param int $industryCode
     */
    public function setIndustryCode($industryCode)
    {
        $this->industryCode = $industryCode;
    }

    /**
     * @return string
     */
    public function getCompanyEmail()
    {
        return $this->companyEmail;
    }

    /**
     * @param string $companyEmail
     */
    public function setCompanyEmail($companyEmail)
    {
        $this->companyEmail = $companyEmail;
    }

    /**
     * @return mixed
     */
    public function getInvoiceForOwningCompany()
    {
        return $this->invoiceForOwningCompany;
    }

    /**
     * @param mixed $invoiceForOwningCompany
     */
    public function setInvoiceForOwningCompany($invoiceForOwningCompany)
    {
        $this->invoiceForOwningCompany = $invoiceForOwningCompany;
    }

    /**
     * @return mixed
     */
    public function getInvoiceForPayingCompany()
    {
        return $this->invoiceForPayingCompany;
    }

    /**
     * @param mixed $invoiceForPayingCompany
     */
    public function setInvoiceForPayingCompany($invoiceForPayingCompany)
    {
        $this->invoiceForPayingCompany = $invoiceForPayingCompany;
    }



}