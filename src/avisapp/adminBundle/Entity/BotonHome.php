<?php

namespace avisapp\adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BotonHome
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BotonHome
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
     * @ORM\Column(name="texto", type="string", length=200 )
     */
    
    
    private $texto;
    
    
          /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=200 )
     */
    
    
    private $url;
    
    


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
     * Set texto
     *
     * @param string $texto
     * @return BotonHome
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;

        return $this;
    }

    /**
     * Get texto
     *
     * @return string 
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return BotonHome
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }
}
