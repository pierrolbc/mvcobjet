<?php

namespace mvc_objet\Models\Services;


use mvc_objet\Models\Daos\ActorDao;
use mvc_objet\Models\Entities\Actor;



class ActorService
{
    private $actorDao;  

    public function __construct()
    {
        $this->actorDao = new actorDao();
    }

    public function getAllActors()
    {
        $actors = $this->actorDao->findAllActors();
        return $actors;
    }

    public function getById($id) {
        $actor = $this->actorDao->findById($id);
        return $actor ;
    }


}