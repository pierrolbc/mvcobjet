<?php

namespace mvc_objet\Models\Services;


use mvc_objet\Models\Daos\MovieDao;
use mvc_objet\Models\Daos\ActorDao;
use mvc_objet\Models\Daos\DirectorDao;
use mvc_objet\Models\Daos\GenreDao;


use mvc_objet\Models\Entities\Genre;
use mvc_objet\Models\Entities\Director;
use mvc_objet\Models\Entities\Actor;
use mvc_objet\Models\Entities\Movie;




class MovieService
{
    private $movieDao; 
    private $actorDao;
    private $genreDao;
    private $directorDao;

    public function __construct()
    {
        $this->movieDao = new MovieDao();
        $this->actorDao = new ActorDao();
        $this->directorDao = new DirectorDao();
        $this->genreDao = new GenreDao();
    }

    public function getById($id) {
        $movie = $this->movieDao->findById($id);
    

        $genre = $this->genreDao->findByMovie($id);
        
        print_r($genre);
        
        $movie->setGenreId($genre);


        $director = $this->directorDao->findByMovie($id);
        print_r($director);
        $movie->setDirectorId($director);

        $actors = $this->actorDao->findByMovie($id);
        foreach ($actors as $actor){
            $movie->addActor($actor);
            var_dump($actor);
        }

        return $movie;
    }  

    public function create($movieData)
    {
        $movie = $this->movieDao->createObjectFromFields($movieData);

        $genre = $this->genreDao->findById($movieData['genre']);
        $movie->setGenreId($genre);

        $director = $this->directorDao->findById($movieData['director']);
        $movie->setDirectorId($director);

        $actor = $this->actorDao->findById($movieData['actor']);

        $this->movieDao->create($movie);
    }

}