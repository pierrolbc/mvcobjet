<?php

namespace mvc_objet\Models\Services;


use mvc_objet\Models\Daos\GenreDao;
use mvc_objet\Models\Entities\Genre;



class GenreService
{
    private $genreDao;  

    public function __construct()
    {
        $this->genreDao = new GenreDao();
    }

    public function getAllGenres()
    {
        $genres = $this->genreDao->findAllGenres();
        return $genres;
    }

    public function getById($id) {
        $genre = $this->genreDao->findById($id);
        return $genre ;
    }

}