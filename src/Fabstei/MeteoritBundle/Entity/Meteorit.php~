<?php

namespace Fabstei\MeteoritBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meteorit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fabstei\MeteoritBundle\Entity\MeteoritRepository")
 */
class Meteorit
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var string $identifikation
     *
     * @ORM\Column(name="identifikation", type="string", length=255)
     */
    private $identifikation;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string $ort
     *
     * @ORM\Column(name="ort", type="string", length=255, nullable=true)
     */
    private $ort;

    /**
     * @var string $latitude
     *
     * @ORM\Column(name="latitude", type="string", length=255, nullable=true)
     */
    private $latitude;

    /**
     * @var string $longitude
     *
     * @ORM\Column(name="longitude", type="string", length=255, nullable=true)
     */
    private $longitude;

    /**
     * @ORM\OneToMany(targetEntity="Typ", mappedBy="meteorit")
     */
    private $typ;

    /**
     * @ORM\OneToMany(targetEntity="Klasse", mappedBy="meteorit")
     */
    private $klasse;

    /**
     * @ORM\OneToMany(targetEntity="Gruppe", mappedBy="meteorit")
     */
    private $gruppe;

    /**
     * @ORM\OneToMany(targetEntity="Petrtyp", mappedBy="meteorit")
     */
    private $petrtyp;

    /**
     * @var string $gewicht
     *
     * @ORM\Column(name="gewicht", type="string", length=255, nullable=true)
     */
    private $gewicht;

    /**
     * @ORM\OneToMany(targetEntity="Strukturtyp", mappedBy="meteorit")
     */
    private $strukturtyp;

    /**
     * @ORM\OneToMany(targetEntity="Bandbreite", mappedBy="meteorit")
     */
    private $bandbreite;

    /**
     * @var string $anmerkung
     *
     * @ORM\Column(name="anmerkung", type="string", length=255, nullable=true)
     */
    private $anmerkung;

    /**
     * @var \DateTime $fall
     *
     * @ORM\Column(name="fall", type="datetime", nullable=true)
     */
    private $fall;

    /**
     * @var string $beschreibung
     *
     * @ORM\Column(name="beschreibung", type="text", nullable=true)
     */
    private $beschreibung;

    /**
     * @var string $zusammensetzung
     *
     * @ORM\Column(name="zusammensetzung", type="text", nullable=true)
     */
    private $zusammensetzung;

    /**
     * @var string $altersbestimmung
     *
     * @ORM\Column(name="altersbestimmung", type="string", length=255, nullable=true)
     */
    private $altersbestimmung;

    public function __toString()
    {
        if($this->name)
        {
            return $this->name;
        } else {
            return $this->identifikation;
        }
        
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
     * @return Meteorit
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
     * Set ort
     *
     * @param string $ort
     * @return Meteorit
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    
        return $this;
    }

    /**
     * Get ort
     *
     * @return string 
     */
    public function getOrt()
    {
        return $this->ort;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Meteorit
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Meteorit
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set identifikation
     *
     * @param string $identifikation
     * @return Meteorit
     */
    public function setIdentifikation($identifikation)
    {
        $this->identifikation = $identifikation;
    
        return $this;
    }

    /**
     * Get identifikation
     *
     * @return string 
     */
    public function getIdentifikation()
    {
        return $this->identifikation;
    }

    /**
     * Set typ
     *
     * @param string $typ
     * @return Meteorit
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;
    
        return $this;
    }

    /**
     * Get typ
     *
     * @return string 
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * Set klasse
     *
     * @param string $klasse
     * @return Meteorit
     */
    public function setKlasse($klasse)
    {
        $this->klasse = $klasse;
    
        return $this;
    }

    /**
     * Get klasse
     *
     * @return string 
     */
    public function getKlasse()
    {
        return $this->klasse;
    }

    /**
     * Set gruppe
     *
     * @param string $gruppe
     * @return Meteorit
     */
    public function setGruppe($gruppe)
    {
        $this->gruppe = $gruppe;
    
        return $this;
    }

    /**
     * Get gruppe
     *
     * @return string 
     */
    public function getGruppe()
    {
        return $this->gruppe;
    }

    /**
     * Set petrtyp
     *
     * @param string $petrtyp
     * @return Meteorit
     */
    public function setPetrtyp($petrtyp)
    {
        $this->petrtyp = $petrtyp;
    
        return $this;
    }

    /**
     * Get petrtyp
     *
     * @return string 
     */
    public function getPetrtyp()
    {
        return $this->petrtyp;
    }

    /**
     * Set subtyp
     *
     * @param string $subtyp
     * @return Meteorit
     */
    public function setSubtyp($subtyp)
    {
        $this->subtyp = $subtyp;
    
        return $this;
    }

    /**
     * Get subtyp
     *
     * @return string 
     */
    public function getSubtyp()
    {
        return $this->subtyp;
    }

    /**
     * Set gewicht
     *
     * @param string $gewicht
     * @return Meteorit
     */
    public function setGewicht($gewicht)
    {
        $this->gewicht = $gewicht;
    
        return $this;
    }

    /**
     * Get gewicht
     *
     * @return string 
     */
    public function getGewicht()
    {
        return $this->gewicht;
    }

    /**
     * Set strukturtyp
     *
     * @param string $strukturtyp
     * @return Meteorit
     */
    public function setStrukturtyp($strukturtyp)
    {
        $this->strukturtyp = $strukturtyp;
    
        return $this;
    }

    /**
     * Get strukturtyp
     *
     * @return string 
     */
    public function getStrukturtyp()
    {
        return $this->strukturtyp;
    }

    /**
     * Set bandbreite
     *
     * @param string $bandbreite
     * @return Meteorit
     */
    public function setBandbreite($bandbreite)
    {
        $this->bandbreite = $bandbreite;
    
        return $this;
    }

    /**
     * Get bandbreite
     *
     * @return string 
     */
    public function getBandbreite()
    {
        return $this->bandbreite;
    }

    /**
     * Set anmerkung
     *
     * @param string $anmerkung
     * @return Meteorit
     */
    public function setAnmerkung($anmerkung)
    {
        $this->anmerkung = $anmerkung;
    
        return $this;
    }

    /**
     * Get anmerkung
     *
     * @return string 
     */
    public function getAnmerkung()
    {
        return $this->anmerkung;
    }

    /**
     * Set fall
     *
     * @param \DateTime $fall
     * @return Meteorit
     */
    public function setFall($fall)
    {
        $this->fall = $fall;
    
        return $this;
    }

    /**
     * Get fall
     *
     * @return \DateTime 
     */
    public function getFall()
    {
        return $this->fall;
    }

    /**
     * Set beschreibung
     *
     * @param string $beschreibung
     * @return Meteorit
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    
        return $this;
    }

    /**
     * Get beschreibung
     *
     * @return string 
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

    /**
     * Set zusammensetzung
     *
     * @param string $zusammensetzung
     * @return Meteorit
     */
    public function setZusammensetzung($zusammensetzung)
    {
        $this->zusammensetzung = $zusammensetzung;
    
        return $this;
    }

    /**
     * Get zusammensetzung
     *
     * @return string 
     */
    public function getZusammensetzung()
    {
        return $this->zusammensetzung;
    }

    /**
     * Set altersbestimmung
     *
     * @param string $altersbestimmung
     * @return Meteorit
     */
    public function setAltersbestimmung($altersbestimmung)
    {
        $this->altersbestimmung = $altersbestimmung;
    
        return $this;
    }

    /**
     * Get altersbestimmung
     *
     * @return string 
     */
    public function getAltersbestimmung()
    {
        return $this->altersbestimmung;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->typ = new \Doctrine\Common\Collections\ArrayCollection();
        $this->klasse = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gruppe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->petrtyp = new \Doctrine\Common\Collections\ArrayCollection();
        $this->strukturtyp = new \Doctrine\Common\Collections\ArrayCollection();
        $this->bandbreite = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add typ
     *
     * @param \Fabstei\MeteoritBundle\Entity\Typ $typ
     * @return Meteorit
     */
    public function addTyp(\Fabstei\MeteoritBundle\Entity\Typ $typ)
    {
        $this->typ[] = $typ;

        return $this;
    }

    /**
     * Remove typ
     *
     * @param \Fabstei\MeteoritBundle\Entity\Typ $typ
     */
    public function removeTyp(\Fabstei\MeteoritBundle\Entity\Typ $typ)
    {
        $this->typ->removeElement($typ);
    }

    /**
     * Add klasse
     *
     * @param \Fabstei\MeteoritBundle\Entity\Klasse $klasse
     * @return Meteorit
     */
    public function addKlasse(\Fabstei\MeteoritBundle\Entity\Klasse $klasse)
    {
        $this->klasse[] = $klasse;

        return $this;
    }

    /**
     * Remove klasse
     *
     * @param \Fabstei\MeteoritBundle\Entity\Klasse $klasse
     */
    public function removeKlasse(\Fabstei\MeteoritBundle\Entity\Klasse $klasse)
    {
        $this->klasse->removeElement($klasse);
    }

    /**
     * Add gruppe
     *
     * @param \Fabstei\MeteoritBundle\Entity\Gruppe $gruppe
     * @return Meteorit
     */
    public function addGruppe(\Fabstei\MeteoritBundle\Entity\Gruppe $gruppe)
    {
        $this->gruppe[] = $gruppe;

        return $this;
    }

    /**
     * Remove gruppe
     *
     * @param \Fabstei\MeteoritBundle\Entity\Gruppe $gruppe
     */
    public function removeGruppe(\Fabstei\MeteoritBundle\Entity\Gruppe $gruppe)
    {
        $this->gruppe->removeElement($gruppe);
    }

    /**
     * Add petrtyp
     *
     * @param \Fabstei\MeteoritBundle\Entity\Petrtyp $petrtyp
     * @return Meteorit
     */
    public function addPetrtyp(\Fabstei\MeteoritBundle\Entity\Petrtyp $petrtyp)
    {
        $this->petrtyp[] = $petrtyp;

        return $this;
    }

    /**
     * Remove petrtyp
     *
     * @param \Fabstei\MeteoritBundle\Entity\Petrtyp $petrtyp
     */
    public function removePetrtyp(\Fabstei\MeteoritBundle\Entity\Petrtyp $petrtyp)
    {
        $this->petrtyp->removeElement($petrtyp);
    }

    /**
     * Add strukturtyp
     *
     * @param \Fabstei\MeteoritBundle\Entity\Strukturtyp $strukturtyp
     * @return Meteorit
     */
    public function addStrukturtyp(\Fabstei\MeteoritBundle\Entity\Strukturtyp $strukturtyp)
    {
        $this->strukturtyp[] = $strukturtyp;

        return $this;
    }

    /**
     * Remove strukturtyp
     *
     * @param \Fabstei\MeteoritBundle\Entity\Strukturtyp $strukturtyp
     */
    public function removeStrukturtyp(\Fabstei\MeteoritBundle\Entity\Strukturtyp $strukturtyp)
    {
        $this->strukturtyp->removeElement($strukturtyp);
    }

    /**
     * Add bandbreite
     *
     * @param \Fabstei\MeteoritBundle\Entity\Bandbreite $bandbreite
     * @return Meteorit
     */
    public function addBandbreite(\Fabstei\MeteoritBundle\Entity\Bandbreite $bandbreite)
    {
        $this->bandbreite[] = $bandbreite;

        return $this;
    }

    /**
     * Remove bandbreite
     *
     * @param \Fabstei\MeteoritBundle\Entity\Bandbreite $bandbreite
     */
    public function removeBandbreite(\Fabstei\MeteoritBundle\Entity\Bandbreite $bandbreite)
    {
        $this->bandbreite->removeElement($bandbreite);
    }
}
