<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ApiResource(
 *  collectionOperations={"get"},
 *  itemOperations={"get"}
 * )
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
