<?php

namespace App\Entity;

use App\Repository\SspaClassRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=SspaClassRepository::class)
 * @Vich\Uploadable
 */
class SspaClass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="time")
     */
    private $startTime;

    /**
     * @ORM\Column(type="time")
     */
    private $endTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $minAge;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxAge;

    /**
     * @ORM\ManyToOne(targetEntity=Venue::class)
     */
    private $venue;

    /**
     * @ORM\Column(type="text")
     */
    private $shortDescription;

    /**
     * @ORM\Column(type="text")
     */
    private $fullDescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $sessionFocus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pricePerLesson;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pricePerTerm;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pricePerYear;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="tutor_image", fileNameProperty="imageName")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity=DayOfWeek::class)
     */
    private $runningDays;

    public function __construct()
    {
        $this->runningDays = new ArrayCollection();
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

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getMinAge(): ?int
    {
        return $this->minAge;
    }

    public function setMinAge(int $minAge): self
    {
        $this->minAge = $minAge;

        return $this;
    }

    public function getMaxAge(): ?int
    {
        return $this->maxAge;
    }

    public function setMaxAge(?int $maxAge): self
    {
        $this->maxAge = $maxAge;

        return $this;
    }

    public function getVenue(): ?Venue
    {
        return $this->venue;
    }

    public function setVenue(?Venue $venue): self
    {
        $this->venue = $venue;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getSessionFocus(): ?string
    {
        return $this->sessionFocus;
    }

    public function setSessionFocus(?string $sessionFocus): self
    {
        $this->sessionFocus = $sessionFocus;

        return $this;
    }

    public function getPricePerLesson(): ?float
    {
        return $this->pricePerLesson;
    }

    public function setPricePerLesson(?float $pricePerLesson): self
    {
        $this->pricePerLesson = $pricePerLesson;

        return $this;
    }

    public function getPricePerTerm(): ?float
    {
        return $this->pricePerTerm;
    }

    public function setPricePerTerm(?float $pricePerTerm): self
    {
        $this->pricePerTerm = $pricePerTerm;

        return $this;
    }

    public function getPricePerYear(): ?float
    {
        return $this->pricePerYear;
    }

    public function setPricePerYear(?float $pricePerYear): self
    {
        $this->pricePerYear = $pricePerYear;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    /**
     * @return Collection|DayOfWeek[]
     */
    public function getRunningDays(): Collection
    {
        return $this->runningDays;
    }

    public function addRunningDay(DayOfWeek $runningDay): self
    {
        if (!$this->runningDays->contains($runningDay)) {
            $this->runningDays[] = $runningDay;
        }

        return $this;
    }

    public function removeRunningDay(DayOfWeek $runningDay): self
    {
        if ($this->runningDays->contains($runningDay)) {
            $this->runningDays->removeElement($runningDay);
        }

        return $this;
    }
}
