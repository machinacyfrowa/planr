<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 */
class Room
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
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Capacity;

    /**
     * @ORM\Column(type="integer")
     */
    private $MaxCapacity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RoomType", inversedBy="Rooms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $RoomType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activity", mappedBy="Room")
     */
    private $scheduledActivities;

    public function __construct()
    {
        $this->scheduledActivities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->Capacity;
    }

    public function setCapacity(int $Capacity): self
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    public function getMaxCapacity(): ?int
    {
        return $this->MaxCapacity;
    }

    public function setMaxCapacity(int $MaxCapacity): self
    {
        $this->MaxCapacity = $MaxCapacity;

        return $this;
    }

    public function getRoomType(): ?RoomType
    {
        return $this->RoomType;
    }

    public function setRoomType(?RoomType $RoomType): self
    {
        $this->RoomType = $RoomType;

        return $this;
    }
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return Collection|Activity[]
     */
    public function getScheduledActivities(): Collection
    {
        return $this->scheduledActivities;
    }

    public function addActivity(Activity $scheduledActivity): self
    {
        if (!$this->scheduledActivities->contains($scheduledActivity)) {
            $this->scheduledActivities[] = $scheduledActivity;
            $scheduledActivity->setRoom($this);
        }

        return $this;
    }

    public function removeActivity(Activity $scheduledActivity): self
    {
        if ($this->scheduledActivities->contains($scheduledActivity)) {
            $this->scheduledActivities->removeElement($scheduledActivity);
            // set the owning side to null (unless already changed)
            if ($scheduledActivity->getRoom() === $this) {
                $scheduledActivity->setRoom(null);
            }
        }

        return $this;
    }
}
