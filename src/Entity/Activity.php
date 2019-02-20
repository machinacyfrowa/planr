<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ActivityRepository")
 */
class Activity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Begin;

    /**
     * @ORM\Column(type="datetime")
     */
    private $End;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Room", inversedBy="activities", fetch="EAGER")
     */
    private $Room;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Course", inversedBy="activities", fetch="EAGER")
     */
    private $Course;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tutor", inversedBy="activities", fetch="EAGER")
     */
    private $Tutor;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Division", inversedBy="activities", fetch="EAGER")
     */
    private $Division;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBegin(): ?\DateTimeInterface
    {
        return $this->Begin;
    }

    public function setBegin(\DateTimeInterface $Begin): self
    {
        $this->Begin = $Begin;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->End;
    }

    public function setEnd(\DateTimeInterface $End): self
    {
        $this->End = $End;

        return $this;
    }

    public function getRoom(): ?Room
    {
        return $this->Room;
    }

    public function setRoom(?Room $Room): self
    {
        $this->Room = $Room;

        return $this;
    }

    public function getCourse(): ?Course
    {
        return $this->Course;
    }

    public function setCourse(?Course $Course): self
    {
        $this->Course = $Course;

        return $this;
    }

    public function getTutor(): ?Tutor
    {
        return $this->Tutor;
    }

    public function setTutor(?Tutor $Tutor): self
    {
        $this->Tutor = $Tutor;

        return $this;
    }

    public function getDivision(): ?Division
    {
        return $this->Division;
    }

    public function setDivision(?Division $Division): self
    {
        $this->Division = $Division;

        return $this;
    }


}
