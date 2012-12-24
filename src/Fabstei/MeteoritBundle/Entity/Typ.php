<?php

namespace Fabstei\MeteoritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typ
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Typ
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
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Meteorit", inversedBy="typ")
     * @ORM\JoinColumn(name="typ_id", referencedColumnName="id")
     */
    private $meteorit;
    
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->name;
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
     * @return Typ
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
     * Set meteorit
     *
     * @param \Fabstei\MeteoritBundle\Entity\Meteorit $meteorit
     * @return Typ
     */
    public function setMeteorit(\Fabstei\MeteoritBundle\Entity\Meteorit $meteorit = null)
    {
        $this->meteorit = $meteorit;

        return $this;
    }

    /**
     * Get meteorit
     *
     * @return \Fabstei\MeteoritBundle\Entity\Meteorit 
     */
    public function getMeteorit()
    {
        return $this->meteorit;
    }
}
