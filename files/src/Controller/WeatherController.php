<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Location;
use App\Repository\LocationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class WeatherController extends AbstractController
{
    #[Route(
        '/weather/{state}/{city}',
        name: 'view_weather_forecasts_by_city',
        requirements:[
            'state' => '[a-zA-Z]{2}',
            'city' => Requirement:: ASCII_SLUG,
        ],
    )]

    public function index(
        LocationRepository $repository,
        ?string $state = null,
        ?string $city = null
    ): Response {
        $location = $repository->findOneByName('perugia');
        /** @var Location $location */
        $forecasts = $location->getForecasts();
        $forecast = reset($forecasts) ?: null;

        return $this->render(
            'weather/index.html.twig',
            [
                'state' => $state,
                'city' => $city,
                'forecast' => $forecast,
            ]
        );
    }
}