<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    # Aïda : ----- attributes ------#
    # Aïda : --- when I create Task entity, i decide that a task should have a title, description and a status
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?bool $status = null;

    # Aïda ------ methods ------#
    # Aïda --- getters and setters ---#
    public function getId(): ?int{return $this->id;}

    public function getTitle(): ?string{return $this->title;}
    public function setTitle(string $title): static{$this->title = $title;return $this;}

    public function getDescription(): ?string{return $this->description;}
    public function setDescription(?string $description): static{$this->description = $description;return $this;}

    public function isStatus(): ?bool{return $this->status;}
    public function setStatus(bool $status): static{$this->status = $status;return $this;}
    
}
