<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActualitesRepository")
 */
class Actualites
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id,
            $titre,
            $chapo,
            $contenu,
            $auteur,
            $date,
            $featuredimage;

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @param mixed $chapo
     */
    public function setChapo($chapo): void
    {
        $this->chapo = $chapo;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur($auteur): void
    {
        $this->auteur = $auteur;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

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

    public function getId()
    {
        return $this->id;
    }
}
