<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartiesRepository")
 */
class Parties
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id ;

    /**
     * @ORM\Column(type="string")
     */
    private  $nom  ;

    /**
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories" )
     * @ORM\JoinColumn(nullable=false , unique=false)
     */
    private $categorie ;

    /**
     * @return mixed
     */
    public function getFeaturedimage()
    {
        return $this->featuredimage;
    }

    /**
     * @param mixed $featuredimage
     */
    public function setFeaturedimage($featuredimage): void
    {
        $this->featuredimage = $featuredimage;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $description ;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user ;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Resume")
     */
    private $resume;

    /**
     * @ORM\Column(type="string")
     */
    private $featuredimage;

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume): void
    {
        $this->resume = $resume;
    }

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
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie): void
    {
        $this->categorie = $categorie;
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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }



    public function getId()
    {
        return $this->id;
    }
}
