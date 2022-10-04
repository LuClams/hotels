<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\PseudoTypes\IntegerRange;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: BookingRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Booking
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    #[ORM\ManyToOne(inversedBy: 'booking', targetEntity: User::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $booker;

    #[ORM\Column(type: 'datetime')]
    #[Assert\GreaterThanOrEqual('today')]
    private $startDate;


    #[ORM\Column(type: 'datetime')]
    #[Assert\Expression('this.getStartDate() < this.getEndDate()')]
    private $endDate;

    #[ORM\Column(type: 'float')]
    private $amount;

    #[ORM\ManyToOne(targetEntity: Room::class, cascade: ['persist', 'remove'], inversedBy: 'booking')]
    #[ORM\JoinColumn(nullable: false)]
    private $room;


    /**
     * Callback appelé à chaque fois qu'on crée une réservation
     *
     * @ORM\PrePersist()
     */
    public function prePersist() {
        if(empty($this->amount)) {
            //prix de l'annonce * nbre de jours
            $this->amount = $this->room->getPrice() * $this->getDuration();
;        }
    }

    public function isBookableDates() {

        // Il faut connaitre les dates qui soont impossibles pour la Suite
        $notAvailableDays = $this ->room->getNotAvailableDays();

        // Il faut comparer les dates choisies avec les dates impossibles
        $bookingDays = $this->getDays();

        $formatDay = function ($day){
            return $day->format('Y-m-d');
        };

        $days = array_map($formatDay, $bookingDays);

        $notAvailable = array_map($formatDay, $notAvailableDays);

        foreach($days as $day) {
            if(array_search($day, $notAvailable)!== false) return false;
        }

        return true;
    }

    /**
     * Permet de récupérer un tableau des journées qui correspondent à ma réservation
     *
     * @return array Un tableau d'objet représentant les jours de la réservation
     */
    public function getDays() {
        $resultat = range(
            $this->startDate->getTimestamp(),
            $this->endDate->getTimestamp(),
            24 * 60 * 60
        );

        $days = array_map(function($dayTimestamp) {
            return new \DateTime(date('Y-m-d', $dayTimestamp));
        }, $resultat);
        return $days;
    }

    public function getDuration() {
        $diff = $this->endDate->diff($this->startDate);
        return $diff->days;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBooker(): ?User
    {
        return $this->booker;
    }

    public function setBooker(User $booker): self
    {
        $this->booker = $booker;

        return $this;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTime $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTime $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {

        $this->amount = $amount;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }

    public function setRoom(Room $room): self
    {
        $this->room = $room;

        return $this;
    }

}
