<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotificationRepository::class)
 */
class Notification
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="notifications")
     */
    private $fromId;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="recivedNotif", cascade={"persist", "remove"})
     */
    private $toId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getFromId(): ?User
    {
        return $this->fromId;
    }

    public function setFromId(?User $fromId): self
    {
        $this->fromId = $fromId;

        return $this;
    }

    public function getToId(): ?User
    {
        return $this->toId;
    }

    public function setToId(?User $toId): self
    {
        $this->toId = $toId;

        return $this;
    }
}
