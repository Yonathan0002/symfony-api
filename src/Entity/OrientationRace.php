<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;

/**
 * @ApiResource(
 *  collectionOperations={"get"},
 *  itemOperations={"get"},
 *  attributes={"order"={"willStartAt","name"}},
 *  shortName="Race"  
 * )
 * @ApiFilter(OrderFilter::class, properties={"willStartAt", "name"}, arguments={"orderParameterName"="order"})
 * @ApiFilter(BooleanFilter::class, properties={"isClosed"})
 * @ApiFilter(SearchFilter::class, properties={"id": "exact","name": "partial"})
 * @ORM\Entity(repositoryClass="App\Repository\OrientationRaceRepository")
 * @ORM\Table(name="Orientation__Race")
 */
class OrientationRace
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $willStartAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isClosed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWillStartAt(): ?\DateTimeInterface
    {
        return $this->willStartAt;
    }

    public function setWillStartAt(\DateTimeInterface $willStartAt): self
    {
        $this->willStartAt = $willStartAt;

        return $this;
    }

    public function getIsClosed(): ?bool
    {
        return $this->isClosed;
    }

    public function setIsClosed(bool $isClosed): self
    {
        $this->isClosed = $isClosed;

        return $this;
    }
}
