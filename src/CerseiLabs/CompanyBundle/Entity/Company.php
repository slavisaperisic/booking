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
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="owningCompanies")
     **/
    private $paymentForOwningCompany;

    /**
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="payingCompanies")
     **/
    private $paymentForPayingCompany;

    /**
     * Company constructor.
     * @param string $companyName
     * @param $addresses
     * @param int $PIB
     * @param int $personalNumber
     * @param int $industryCode
     * @param string $companyEmail
     * @param $paymentForOwningCompany
     * @param $paymentForPayingCompany
     */
    public function __construct($companyName, $addresses, $PIB, $personalNumber, $industryCode, $companyEmail, $paymentForOwningCompany, $paymentForPayingCompany)
    {
        $this->companyName = $companyName;
        $this->addresses = $addresses;
        $this->PIB = $PIB;
        $this->personalNumber = $personalNumber;
        $this->industryCode = $industryCode;
        $this->companyEmail = $companyEmail;
        $this->paymentForOwningCompany = $paymentForOwningCompany;
        $this->paymentForPayingCompany = $paymentForPayingCompany;
    }


}