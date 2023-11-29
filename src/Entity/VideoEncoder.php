<?php

namespace App\Entity;

use App\Repository\VideoEncoderRepository;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\VideoSource;

#[ORM\Entity(repositoryClass: VideoEncoderRepository::class)]
class VideoEncoder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $idEncoder;

    #[ORM\Column]
    private int $idVideo;

    #[ORM\Column]
    private int $size;

    #[ORM\Column(length: 50)]
    private string $quality;



    // #[ManyToOne(targetEntity: VideoSource::class, inversedBy: "videoEncoders")]
    // #[JoinColumn(name: "id_video", referencedColumnName: "id")]
    // private VideoSource $videoSource;

    public function __construct(int $id,
                                int $size,
                                string $quality)
    {
        $this->id = $id;
        $this->size = $size;
        $this->quality = $quality;
    }

    public function serialize(): array
    {
        return [
            "id" => $this->id,
            "idEncoder" => $this->idEncoder,
            "idVideo" => $this->idVideo,
            "size" => $this->size,
            "quality" => $this->quality,
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

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getQuality(): string
    {
        return $this->quality;
    }

    public function setQuality(string $quality): static
    {
        $this->quality = $quality;

        return $this;
    }
}
