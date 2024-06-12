<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 10)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    /**
     * @var Collection<int, ItemImage>
     */
    #[ORM\OneToMany(targetEntity: ItemImage::class, mappedBy: 'item')]
    private Collection $images;

    #[ORM\Column(length: 255)]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Shape $shape = null;

    public function __construct()
    {
        $this->item = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): static
    {
        $this->color = $color;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getShape(): ?Shape
    {
        return $this->shape;
    }

    public function setShape(?Shape $shape): static
    {
        $this->shape = $shape;

        return $this;
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(ItemImage $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setItem($this);
        }
        return $this;
    }

    public function removeImage(ItemImage $itemImage): self
    {
        if ($this->images->removeElement($itemImage)) {
            // set the owning side to null (unless already changed)
            if ($itemImage->getItem() === $this) {
                $itemImage->setItem(null);
            }
        }
        return $this;
    }
}
