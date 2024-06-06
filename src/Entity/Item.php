<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    /**
     * @var Collection<int, ItemImage>
     */
    #[ORM\OneToMany(targetEntity: ItemImage::class, mappedBy: 'item')]
    private Collection $item;

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

    /**
     * @return Collection<int, ItemImage>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(ItemImage $item): static
    {
        if (!$this->item->contains($item)) {
            $this->item->add($item);
            $item->setItem($this);
        }

        return $this;
    }

    public function removeItem(ItemImage $item): static
    {
        if ($this->item->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getItem() === $this) {
                $item->setItem(null);
            }
        }

        return $this;
    }
}
