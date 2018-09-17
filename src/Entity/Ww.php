<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WwRepository")
 */
class Ww
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
    private $ww;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWw(): ?string
    {
        return $this->ww;
    }

    public function setWw(?string $ww): self
    {
        $this->ww = $ww;

        return $this;
    }
}
