<?php

declare(strict_types=1);

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
#[ORM\Table(name: 'forecasts')]
class Forecast
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


    #[ORM\Column(name:'name', type:'datetimetz_immutable')]
    private \DateTimeImmutable $date;
    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }
    public function setDate(\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }


    #[ORM\ManyToOne(targetEntity: Location::class, inversedBy:'forecasts')]
    #[ORM\JoinColumn(name: 'location_id', referencedColumnName: 'id', nullable: false, onDelete:'CASCADE' )]
    private Location $location;
    public function getLocation(): Location
    {
        return $this->location;
    }
    public function setLocation(Location $location): void
    {
        $this->location = $location;
    }


    #[ORM\Column(name:'short_description', type:'string')]
    private string $shortDescription;
    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }
    public function setShortDescription(string $shortDescription): void
    {
        $this->shortDescription = $shortDescription;
    }


    #[ORM\Column(name:'wind_speed_kmh', type:'integer', nullable: true)]
    private ?int $windSpeedKmh = null;
    public function getWindSpeedKmh(): ?int
    {
        return $this->windSpeedKmh;
    }
    public function setWindSpeedKmh(?int $windSpeedKmh): void
    {
        $this->windSpeedKmh = $windSpeedKmh;
    }


    #[ORM\Column(name:'minimum_celsius_temperature', type:'integer', nullable: true)]
    private ?int $minimumCelsiusTemperature = null;
    public function getMinimumCelsiusTemperature(): ?int
    {
        return $this->minimumCelsiusTemperature;
    }
    public function setMinimumCelsiusTemperature(?int $minimumCelsiusTemperature): void
    {
        $this->minimumCelsiusTemperature = $minimumCelsiusTemperature;
    }


    #[ORM\Column(name:'maximum_celsius_temperature', type:'integer', nullable: true)]
    private ?int $maximumCelsiusTemperature = null;
    public function getMaximumCelsiusTemperature(): ?int
    {
        return $this->maximumCelsiusTemperature;
    }
    public function setMaximumCelsiusTemperature(?int $maximumCelsiusTemperature): void
    {
        $this->maximumCelsiusTemperature = $maximumCelsiusTemperature;
    }


    #[ORM\Column(name:'humidity_percentage', type:'integer', nullable: true)]

    private ?int $humidityPercentage = null;
    public function getHumidityPercentage(): ?int
    {
        return $this->humidityPercentage;
    }
    public function setHumidityPercentage(?int $humidityPercentage): void
    {
        $this->humidityPercentage = $humidityPercentage;
    }


    public function __construct(\DateTimeImmutable $date, Location $location, string $shortDescription)
    {
        $this->date = $date;
        $this->location = $location;
        $this->shortDescription = $shortDescription;
    }

}
