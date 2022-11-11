<?php

namespace App\Entity;

use App\Repository\HostelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HostelRepository::class)]
class Hostel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\OneToMany(mappedBy: 'hostel', targetEntity: Room::class)]
    private $room;

    #[ORM\OneToOne(mappedBy: 'hostel', targetEntity: Supervisor::class, cascade: ['persist', 'remove'])]
    private $supervisor;

    #[ORM\OneToMany(mappedBy: 'tohostel', targetEntity: Slideimage::class, cascade: ['persist', 'remove'])]
    private Collection $slidesroom;


    public function __construct()
    {
        $this->room = new ArrayCollection();
        $this->slidesroom = new ArrayCollection();
    }


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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

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

    /**
     * @return Collection<int, Room>
     */
    public function getRoom(): Collection
    {
        return $this->room;
    }

    public function addRoom(Room $room): self
    {
        if (!$this->room->contains($room)) {
            $this->room[] = $room;
            $room->setHostel($this);
        }

        return $this;
    }

    public function removeRoom(Room $room): self
    {
        if ($this->room->removeElement($room)) {
            // set the owning side to null (unless already changed)
            if ($room->getHostel() === $this) {
                $room->setHostel(null);
            }
        }

        return $this;
    }

    public function getSupervisor(): ?Supervisor
    {
        return $this->supervisor;
    }

    public function setSupervisor(Supervisor $supervisor): self
    {
        // set the owning side of the relation if necessary
        if ($supervisor->getHostel() !== $this) {
            $supervisor->setHostel($this);
        }

        $this->supervisor = $supervisor;

        return $this;
    }


    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<int, Slideimage>
     */
    public function getSlidesroom(): Collection
    {
        return $this->slidesroom;
    }

    public function addSlidesroom(Slideimage $slidesroom): self
    {
        if (!$this->slidesroom->contains($slidesroom)) {
            $this->slidesroom->add($slidesroom);
            $slidesroom->setTohostel($this);
        }

        return $this;
    }

    public function removeSlidesroom(Slideimage $slidesroom): self
    {
        if ($this->slidesroom->removeElement($slidesroom)) {
            // set the owning side to null (unless already changed)
            if ($slidesroom->getTohostel() === $this) {
                $slidesroom->setTohostel(null);
            }
        }

        return $this;
    }
}
