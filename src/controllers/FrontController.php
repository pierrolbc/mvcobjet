<?php

namespace mvc_objet\Controllers;
// l'espace de nom est le nom de mon projet + le nom du répertoire ou se trouve mpon controleur
// puis commande composer dumpautolaod 
// creation d'un répertoire vendor.composer/autoload.php
// qu'on peut injecter dans le fichier d'index pour chargement automatiquement les librairies

/*
sur le version précédente j'utilisais DAO directement , ici on passe par les services
*/

//use mvcobjet\Models\Daos\GenreDao;
//use mvcobjet\Models\Entities\Genre;
//use mvc_objet\Models\Services; 
use mvc_objet\Models\Services\GenreService; 
use mvc_objet\Models\Services\ActorService;
use mvc_objet\Models\Services\DirectorService;
use mvc_objet\Models\Services\MovieService; 
use Twig\Environment; 


class FrontController
{
    private $genreService;
    private $actorService;
    private $directorService;
    private $movieService;
    private $twig;

    public function __construct($twig){
  //public function __construct(){
        // instanciation du service Genre
        $this->genreService = new GenreService();
        $this->actorService = new ActorService();
        $this->directorService = new DirectorService();
        $this->movieService = new MovieService();
        $this->twig = $twig;
    }

    public function genres() {
        /* 
         sur la version précédente j'utilisais DAO directement , ici on passe par les services
             avant :$genreDao = new GenreDao();
             */
           // $genres = $genreDao->findAll();
       
       $genres = $this->genreService->getAllGenres();
       
        /*
            on affichait les genres directement dans le controleur
            ici on lance le template...
            foreach($genres as $genre) {
                echo $genre->getName();
            }
        */
       
        /*
            on affichait les genres directement dans le controleur
            ici on lance le template php de base
            Perso: php était déja un moteur de template mais les framework s'évertuenet à utiliser d'autres templates
        */
       // include_once __DIR__.'/../views/genre.php';
        echo $this->twig->render('genre.html.twig', [ "genres" => $genres ] );

    }
    public function actors() {
        $actors = $this->actorService->getAllActors();
      //  include_once __DIR__.'/../views/actor.php';
       echo $this->twig->render('actor.html.twig', [ "actors" => $actors ] );
    }

    public function directors() {
    $directors = $this->directorService->getAllDirectors();
        //include_once __DIR__.'/../views/director.php';
    echo $this->twig->render('director.html.twig', [ "directors" => $directors ]);
    }

    
    public function movie($id) {
        $movie = $this->movieService->getById($id);
        //include_once __DIR__.'/../views/movies.php';
        echo $this->twig->render('movie.html.twig', [ "movie" => $movie ]);
    }



}