<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Entity\File;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[ORM\Entity(repositoryClass: RoomRepository::class)]
#[Uploadable]
/**
 * @Vich\Uploadable
 */
class Room
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $image;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: Booking::class, cascade: ['persist', 'remove'])]
    private $bookings;

    #[ORM\ManyToOne(targetEntity: Hostel::class, inversedBy: 'room')]
    #[ORM\JoinColumn(nullable: false)]
    private $hostel;

    #[ORM\ManyToOne(targetEntity: Supervisor::class, inversedBy: 'room')]
    private $supervisor;

    /**
     * @var File

     * @Vich\UploadableField(mapping="room", fileNameProperty="image")
     */
    #[Vich\UploadableField(mapping: 'room', fileNameProperty: 'image')]
    private $imageFile;

    #[ORM\Column]
    private ?int $countrooms = null;

    #[ORM\OneToMany(mappedBy: 'room', targetEntity: Slideimage::class, orphanRemoval: true)]
    private Collection $slideimages;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'bookedrooms')]
    private Collection $booker;


    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->slideimages = new ArrayCollection();
        $this->booker = new ArrayCollection();
    }


    /**
     * Permet d'obtenir un tableau des jours qui ne sont pas disponible
     *
     * @return array Un tableau d'objet Datetime représentant les jours d'occupation
     */
    public function getNotAvailableDays(): array
    {
        $notAvailableDays = [];

        foreach ($this->bookings as $booking) {
            // calculer les jours qui se trouvent entre la date d'arrivée et de départ
            $resultat = range(
                $booking->getStartDate()->getTimestamp(),
                $booking->getEndDate()->getTimestamp(),
                24 * 60 * 60
            );

            $days = array_map(function($dayTimestamp){
                return new \DateTime(date('Y-m-d', $dayTimestamp));
            }, $resultat);

            $notAvailableDays = array_merge($notAvailableDays, $days);
        }

        return $notAvailableDays;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function setImageFile(File $image=null)
    {
        $this->imageFile = $image;

    }


    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getHostel(): ?Hostel
    {
        return $this->hostel;
    }

    public function setHostel(?Hostel $hostel): self
    {
        $this->hostel = $hostel;

        return $this;
    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setRoom($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getRoom() === $this) {
                $booking->setRoom(null);
            }
        }

        return $this;
    }

    public function __toString() {

        return $this->title;
    }

    public function getSupervisor(): ?Supervisor
    {
        return $this->supervisor;
    }

    public function setSupervisor(?Supervisor $supervisor): self
    {
        $this->supervisor = $supervisor;

        return $this;
    }

    public function getCountrooms(): ?int
    {
        return $this->countrooms;
    }

    public function setCountrooms(int $countrooms): self
    {
        $this->countrooms = $countrooms;

        return $this;
    }

    /**
     * @return Collection<int, Slideimage>
     */
    public function getSlideimages(): Collection
    {
        return $this->slideimages;
    }

    public function addSlideimage(Slideimage $slideimage): self
    {
        if (!$this->slideimages->contains($slideimage)) {
            $this->slideimages->add($slideimage);
            $slideimage->setRoom($this);
        }

        return $this;
    }

    public function removeSlideimage(Slideimage $slideimage): self
    {
        if ($this->slideimages->removeElement($slideimage)) {
            // set the owning side to null (unless already changed)
            if ($slideimage->getRoom() === $this) {
                $slideimage->setRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getBooker(): Collection
    {
        return $this->booker;
    }

    public function addBooker(User $booker): self
    {
        if (!$this->booker->contains($booker)) {
            $this->booker->add($booker);
        }

        return $this;
    }

    public function removeBooker(User $booker): self
    {
        $this->booker->removeElement($booker);

        return $this;
    }

}
