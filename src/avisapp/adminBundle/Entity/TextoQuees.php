<?php

namespace avisapp\adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TextoQuees
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TextoQuees
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
     * @ORM\Column(name="foto", type="string", length=255)
     */
    
    
    private $texto;
    
    


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
     * @return TextoQuees
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
}
