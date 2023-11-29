<?php

namespace App\Entity;

use App\Repository\VideoSourceRepository;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\EntityInterface;

#[ORM\Entity(repositoryClass: VideoSourceRepository::class)]
class VideoSource implements EntityInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column]
    private int $duration;

    #[ORM\Column]
    private int $size;

    #[ORM\Column(length: 50)]
    private string $videoQuality;

    public __construct(int $id,
                       string $name,
                       int $duration,
                       int $size,
                       string $videoQuality) {
        $this->id = $id;
        $this->name = $name;
        $this->duration = $duration;
        $this->size = $size;
        $this->videoQuality = $videoQuality;
    }

    public function serialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "duration" => $this->duration,
            "size" => $this->size,
            "videoQuality" => $this->videoQuality,
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getVideoQuality(): string
    {
        return $this->videoQuality;
    }

    public function setVideoQuality(string $videoQuality): static
    {
        $this->videoQuality = $videoQuality;

        return $this;
    }
}
