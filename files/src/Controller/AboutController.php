<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AboutController
{
    #[Route('/about/{subject}', name: 'about')]
    public function index(?string $subject = null): Response
    {
        if (null !== $subject) {
            return new Response("<html><body> Ciao $subject! </body></html>");
        }

        return new Response('<html><body> Seconda </body></html>');
    }
}
