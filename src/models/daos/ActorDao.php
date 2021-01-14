<?php

namespace mvc_objet\Models\Daos;

use mvc_objet\Models\Entities\Actor;

class ActorDao extends BaseDao
{
   
    public function findAllActors(){
        $stmt = $this->db->prepare("SELECT * FROM actor ");
        $res = $stmt->execute();
        if ($res) {
            $actors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $actors[] = $this->createObjectFromFields($row);
            }
            return $actors;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id): Actor
    {
        $stmt = $this->db->prepare("SELECT * FROM actor WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res){
            return $stmt->fetchObject(actor::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findByMovie($movieId){
        $stmt = $this->db->prepare("
        SELECT id, first_name as firstName, last_name as lastName 
        from actor
        INNER JOIN movies_actors ON movies_actors.actor_id = actor.id
        WHERE movie_id = :movieId
        ");

        $res = $stmt->execute([':movieId' => $movieId]);

        if ($res) {
            return $stmt->fetchAll(\PDO::FETCH_CLASS, Actor::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    

    public function createObjectFromFields($fields): actor
    {
        //
        // liaison entre la donnée BDD et l'objet 
        // ici on voit le chainage ->setId->setName 
        //
        $actor = new actor();
        $actor->setId($fields['id'])
              ->setFirstName($fields['first_name'])
              ->setLastName($fields['last_name']);      

        return $actor;
    }




}