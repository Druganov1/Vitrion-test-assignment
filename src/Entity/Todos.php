<?php

namespace App\Entity;

use App\Repository\TodosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

// 3. "Gebruik de Symfony Serializer om entities om te zetten naar JSON responses."
#[ApiResource(
    normalizationContext: ['groups' => ['todo:read']],
    denormalizationContext: ['groups' => ['todo:write'], 'disable_type_enforcement' => true /* << https://stackoverflow.com/a/61363716*/]
)]
#[ORM\Entity(repositoryClass: TodosRepository::class)]
class Todos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['todo:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['todo:read', 'todo:write'])]
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, max: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['todo:read', 'todo:write'])]
    #[Assert\Length(max: 1000)]
    private ?string $description = null;

    #[ORM\Column(type: Types::BOOLEAN)]
    #[Groups(['todo:read', 'todo:write'])]
    #[Assert\Type(type: 'bool', message: 'Finished must be true or false.')]
    private $finished = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function isFinished(): ?bool
    {
        return $this->finished;
    }

    // Hier hebben we bool weggelaten omdat hij anders door PHP geconverteerd wordt naar een bool ookal is het een string.
    public function setFinished($finished): static
    {
        $this->finished = $finished;

        return $this;
    }
}
