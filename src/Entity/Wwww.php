<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WwwwRepository")
 */
class Wwww
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wwww;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWwww(): ?string
    {
        return $this->wwww;
    }

    public function setWwww(?string $wwww): self
    {
        $this->wwww = $wwww;

        return $this;
    }
}
