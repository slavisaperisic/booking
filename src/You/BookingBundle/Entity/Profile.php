<?php

namespace You\BookingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="Profile")
 * @ORM\Entity
 */
class Profile
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
     * @ORM\Column(name="facebookurl", type="string", length=50, nullable=false)
     */
    private $facebookurl;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterurl", type="string", length=50, nullable=false)
     */
    private $twitterurl;

    /**
     * @var string
     *
     * @ORM\Column(name="phonenumber", type="string", length=50, nullable=false)
     */
    private $phonenumber;

    /**
     * @ORM\OneToOne(targetEntity="Doctor", inversedBy="profile")
     * @ORM\JoinColumn(name="doctor_id", referencedColumnName="id")
     **/
    private $doctor;

    /**
     * @ORM\OneToOne(targetEntity="Clinic", inversedBy="profile")
     * @ORM\JoinColumn(name="clinic_id", referencedColumnName="id")
     **/
    private $clinic;

    /**
     * Set facebookurl
     *
     * @param string $facebookurl
     *
     * @return Profile
     */
    public function setFacebookurl($facebookurl)
    {
        $this->facebookurl = $facebookurl;

        return $this;
    }

    /**
     * Get facebookurl
     *
     * @return string
     */
    public function getFacebookurl()
    {
        return $this->facebookurl;
    }

    /**
     * Set twitterurl
     *
     * @param string $twitterurl
     *
     * @return Profile
     */
    public function setTwitterurl($twitterurl)
    {
        $this->twitterurl = $twitterurl;

        return $this;
    }

    /**
     * Get twitterurl
     *
     * @return string
     */
    public function getTwitterurl()
    {
        return $this->twitterurl;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     *
     * @return Profile
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return string
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
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
