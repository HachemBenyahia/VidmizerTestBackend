<?php

namespace App\Entity;

use App\Repository\VideoFolderRepository;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\VideoSource;

#[ORM\Entity(repositoryClass: VideoFolderRepository::class)]
class VideoFolder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $folderName;

    #[ManyToOne(targetEntity: VideoSource::class, inversedBy: "folders")]
    #[JoinColumn(name: 'id_video', referencedColumnName: "id")]
    private VideoSource $videoSource;

    public function __construct(int $id,
                                int $folderName)
    {
        $this->id = $id;
        $this->folderName = $folderName;
    }

    public function serialize(): array
    {
        return [
            "id" => $this->id,
            "folderName" => $this->folderName,
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

    public function getFolderName(): string
    {
        return $this->folderName;
    }

    public function setFolderName(string $folderName): static
    {
        $this->folderName = $folderName;

        return $this;
    }
}
