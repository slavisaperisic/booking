<?php

namespace CerseiLabs\CompanyBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Address
 *
 * @ORM\Table(name="Task")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Task
{

    /**
     * @var integer
     *
     * @ORM\Column(name="TaskID", type="integer")
     * @ORM\Id
     * @JMS\Type("integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="TaskTitle", type="string", length=300, nullable=true)
     * @JMS\Type("string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="TaskDescription", type="text", nullable=true)
     * @JMS\Type("string")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="TaskPriority", type="integer", length=1, nullable=true)
     * @JMS\Type("string")
     */
    private $priority;

    /**
     * @var string
     *
     * @ORM\Column(name="TaskStatus", type="integer", length=1, nullable=true)
     * @JMS\Type("integer")
     */
    private $status;

    /**
     * Task constructor.
     * @param string $title
     * @param string $description
     */
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /** @ORM\PrePersist */
    public function updateStatus()
    {
        $this->status = 0;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}