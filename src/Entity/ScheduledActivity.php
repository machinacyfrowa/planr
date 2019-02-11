<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScheduledActivityRepository")
 */
class ScheduledActivity
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
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Classroom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $StudentGroup;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lecturer;

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

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }
    
    public function getClassroom(): ?string
    {
        return $this->Classroom;
    }

    public function setClassroom(string $Classroom): self
    {
        $this->Classroom = $Classroom;

        return $this;
    }

    public function getStudentGroup(): ?string
    {
        return $this->StudentGroup;
    }

    public function setStudentGroup(string $StudentGroup): self
    {
        $this->StudentGroup = $StudentGroup;

        return $this;
    }

    public function getLecturer(): ?string
    {
        return $this->Lecturer;
    }

    public function setLecturer(string $Lecturer): self
    {
        $this->Lecturer = $Lecturer;

        return $this;
    }


}