<?php

namespace Fabstei\MeteoritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gruppe
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Gruppe
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
     * @var integer
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;


    /**
     * @ORM\ManyToOne(targetEntity="Meteorit", inversedBy="gruppe")
     * @ORM\JoinColumn(name="gruppe_id", referencedColumnName="id")
     */
    private $meteorit;
    
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString()
    {
        return $this->id;
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
     * Set meteorit
     *
     * @param \Fabstei\MeteoritBundle\Entity\Meteorit $meteorit
     * @return Gruppe
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

    /**
     * Set name
     *
     * @param integer $name
     * @return Gruppe
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return integer 
     */
    public function getName()
    {
        return $this->name;
    }
}
