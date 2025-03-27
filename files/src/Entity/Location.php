<?php
declare(strict_types=1);

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'locations')]
class Location
{
    #[ORM\Id()]
    #[ORM\GeneratedValue()]
    #[ORM\Column(name:'id', type:'integer')]
    /** @phpstan-ignore property.onlyRead */
    private int $id;
    public function getId(): int
    {
        return $this->id;
    }


    #[ORM\Column(name:'name', type:'string')]
    private string $name;
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    #[ORM\Column(name:'country', type:'string', length: 2)]
    private string $country;
    public function getCountry(): string
    {
        return $this->country;
    }
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }


    #[ORM\Column(name:'latitude', type:'decimal', precision: 10, scale: 8, nullable: true)]
    private ?string $latitude = null;
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }
    public function setLatitude(?string $latitude): void
    {
        $this->latitude = $latitude;
    }


    #[ORM\Column(name:'longitude', type:'decimal', precision: 11, scale: 8, nullable: true)]
    private ?string $longitude = null;
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }
    public function setLongitude(?string $longitude): void
    {
        $this->longitude = $longitude;
    }


    #[ORM\OneToMany(targetEntity:Forecast::class, mappedBy: 'location')]
    /** @type Collection<Forecast> */
    private Collection $forecasts;

    public function getForecasts(): array
    {
        return $this->forecasts->toArray();
    }


    public function __construct(string $name, string $country)
    {
        $this -> name = $name;
        $this -> country = $country;
        $this -> forecasts = new ArrayCollection();
    }


}