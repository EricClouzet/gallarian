<?php
//Assert\File qui vérifie qu'il s'agit bien d'un type fichier
//Assert\Image vérifie qu'il s'agit que de types images
//Assert\Email vérifie que l'email est valide par rapport aux standarts
//Assert\Url vérifie que l'url est valide
//Assert\Regex vérification de filtre (créer son propre filtre)
//Assert\UserPassword permet de vérifier que le MDP entré est différent de celui de la BDD
//Assert\EqualTo permet de tester une égalité entre deux propriétés
//@UniqueEntity(fields={"name", "content"}, message="Vous ne pouvez pas avoir deux fois la même catégorie pour ces champs")
//@UniqueEntity("content", message="Vous ne pouvez pas avoir deux fois le même content")
// @UniqueEntity("name", message="Vous ne pouvez pas avoir deux fois la même catégorie")
namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use DateTime;//mise à jours de la date

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @ORM\Table(name="categories")
 * @UniqueEntity("name", message="Vous ne pouvez pas avoir deux fois la même catégorie")
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="nom", unique=true)
     * @Assert\Length(min=5, max=255, minMessage="Ce champ doit faire au minimum {{ limit }} caractères", maxMessage="Ce champ ne doit pas dépasser {{ limit }} caractères")
     * @Assert\NotBlank(message="Ce champ ne peut pas être vide")
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActived;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;


    // public $test;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updateAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * Méthode toujours appelée lors de la création d'un objet
     */
    public function __construct()
    {
        $this->createdAt=new DateTime();//mise à jours de la date
        $this->isActived= true;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIsActived(): ?bool
    {
        return $this->isActived;
    }

    public function setIsActived(bool $isActived): self
    {
        $this->isActived = $isActived;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeInterface
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeInterface $updateAt): self
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }


}
