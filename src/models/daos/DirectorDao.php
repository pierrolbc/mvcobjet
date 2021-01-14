<?php

namespace mvc_objet\Models\Daos;

use mvc_objet\Models\Entities\Director;

class DirectorDao extends BaseDao
{
   
    public function findAllDirectors(){
        $stmt = $this->db->prepare("SELECT * FROM director ");
        $res = $stmt->execute();
        if ($res) {
            $directors = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $directors[] = $this->createObjectFromFields($row);
            }
            return $directors;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id): Director
    {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res){
            return $stmt->fetchObject(director::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    public function findByMovie($movieId){
        $stmt = $this->db->prepare("
        SELECT director.id, director.first_name, director.last_name  
        from director
        INNER JOIN movie ON movie.director_id = director.id
        WHERE movie.id = :movieId
        ");

        $res = $stmt->execute([':movieId' => $movieId]);

        if ($res) {
            return $stmt->fetchObject(Director::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }



    public function createObjectFromFields($fields): director
    {
        //
        // liaison entre la donnée BDD et l'objet 
        // ici on voit le chainage ->setId->setName 
        //
        $director = new director();
        $director->setId($fields['id'])
                 ->setFirstName($fields['first_name'])
                 ->setLastName($fields['last_name']);           

        return $director;
    }




}