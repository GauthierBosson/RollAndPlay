<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FichePersonnagesRepository")
 */
class FichePersonnages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\Column(type="string")
     */
    private $image;


    /**
     * @ORM\Column(type="string")
     */
    private $description ;

    /**
     * @ORM\Column(type="string")
     */
    private $caracteristique;

    /**
     * @ORM\Column(type="string")
     */
    private $competence;

    /**
     * @ORM\Column(type="string")
     */
    private $inventaire;

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCaracteristique()
    {
        return $this->caracteristique;
    }

    /**
     * @param mixed $caracteristique
     */
    public function setCaracteristique($caracteristique): void
    {
        $this->caracteristique = $caracteristique;
    }

    /**
     * @return mixed
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * @param mixed $competence
     */
    public function setCompetence($competence): void
    {
        $this->competence = $competence;
    }

    /**
     * @return mixed
     */
    public function getInventaire()
    {
        return $this->inventaire;
    }

    /**
     * @param mixed $inventaire
     */
    public function setInventaire($inventaire): void
    {
        $this->inventaire = $inventaire;
    }

    public function getId()
    {
        return $this->id;
    }
}
