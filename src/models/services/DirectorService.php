<?php

namespace mvc_objet\Models\Services;


use mvc_objet\Models\Daos\DirectorDao;
use mvc_objet\Models\Entities\Director;



class DirectorService
{
    private $directorDao;  

    public function __construct()
    {
        $this->directorDao = new directorDao();
    }

    public function getAllDirectors()
    {
        $directors = $this->directorDao->findAllDirectors();
        return $directors;
    }

    public function getById($id) {
        $director = $this->directorDao->findById($id);
        return $director ;
    }


}