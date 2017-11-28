<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Livre
 *
 * @ORM\Table(name="livre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LivreRepository")
 */
class Livre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="liv_titre", type="string", length=255)
     */
    private $liv_titre;

    /**
     * @var string
     *
     * @ORM\Column(name="liv_auteur", type="string", length=255)
     */
    private $liv_auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="liv_description", type="string", length=1000)
     */
    private $liv_description;

    /**
     * @var string
     *
     * @ORM\Column(name="liv_date_parution", type="string", length=25)
     */
    private $liv_dateParution;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set livTitre
     *
     * @param string $livTitre
     *
     * @return Livre
     */
    public function setLivTitre($livTitre)
    {
        $this->liv_titre = $livTitre;

        return $this;
    }

    /**
     * Get livTitre
     *
     * @return string
     */
    public function getLivTitre()
    {
        return $this->liv_titre;
    }

    /**
     * Set livAuteur
     *
     * @param string $livAuteur
     *
     * @return Livre
     */
    public function setLivAuteur($livAuteur)
    {
        $this->liv_auteur = $livAuteur;

        return $this;
    }

    /**
     * Get livAuteur
     *
     * @return string
     */
    public function getLivAuteur()
    {
        return $this->liv_auteur;
    }

    /**
     * Set livDescription
     *
     * @param string $livDescription
     *
     * @return Livre
     */
    public function setLivDescription($livDescription)
    {
        $this->liv_description = $livDescription;

        return $this;
    }

    /**
     * Get livDescription
     *
     * @return string
     */
    public function getLivDescription()
    {
        return $this->liv_description;
    }

    /**
     * Set livDateParution
     *
     * @param string $livDateParution
     *
     * @return Livre
     */
    public function setLivDateParution($livDateParution)
    {
        $this->liv_dateParution = $livDateParution;

        return $this;
    }

    /**
     * Get livDateParution
     *
     * @return string
     */
    public function getLivDateParution()
    {
        return $this->liv_dateParution;
    }

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categorie", inversedBy="livres")
     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
     */

    private $categorie;

    public function __construct()
    {
        $date = new \DateTime();
        $this->setLivDateParution($date);
        $this->categorie = new ArrayCollection();
    }
}

