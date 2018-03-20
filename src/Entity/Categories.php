<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id,
            $categorielibelle;

    /**
     * @return mixed
     */
    public function getCategorielibelle()
    {
        return $this->categorielibelle;
    }

    /**
     * @param mixed $categorielibelle
     */
    public function setCategorielibelle($categorielibelle): void
    {
        $this->categorielibelle = $categorielibelle;
    }

    public function getId()
    {
        return $this->id;
    }
}
