<?php

namespace mvc_objet\Controllers;

use mvc_objet\Models\Services\MovieService;

class BackController
{
    private $movieService;

    public function __construct()
    {
        $this->movieService = new MovieService();
    }

    public function addMovie($movieData)
    {
        $this->movieService->create($movieData);
    }
}