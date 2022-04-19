<?php

namespace App\Entity;

use App\Repository\TicketRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $openedBy;

    #[ORM\Column(type: 'boolean')]
    private ?bool $isHandled;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $file;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $closedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpenedBy(): ?string
    {
        return $this->openedBy;
    }

    public function setOpenedBy(string $openedBy): self
    {
        $this->openedBy = $openedBy;

        return $this;
    }

    public function getIsHandled(): ?bool
    {
        return $this->isHandled;
    }

    public function setIsHandled(bool $isHandled): self
    {
        $this->isHandled = $isHandled;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getClosedAt(): ?\DateTimeInterface
    {
        return $this->closedAt;
    }

    public function setClosedAt(\DateTimeInterface $closedAt): self
    {
        $this->closedAt = $closedAt;

        return $this;
    }
}
