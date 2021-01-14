<?php

namespace mvc_objet\Models\Daos;

use mvc_objet\Models\Entities\Genre;

class GenreDao extends BaseDao
{
   
    public function findAllGenres(){
        $stmt = $this->db->prepare("SELECT * FROM genre ");
        $res = $stmt->execute();
        if ($res) {
            $genres = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $genres[] = $this->createObjectFromFields($row);
            }
            return $genres;
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function findById($id): Genre
    {
        $stmt = $this->db->prepare("SELECT * FROM genre WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res){
            return $stmt->fetchObject(genre::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    
    public function findByMovie($movieId)
    {
        $stmt = $this->db->prepare("SELECT genre.id, genre.name FROM genre INNER JOIN movie ON movie.genre_id = genre.id  WHERE movie.id = :movieId");
        $res = $stmt->execute([':movieId' => $movieId]);

        if($res){
            return $stmt->fetchObject(Genre::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }

    public function createObjectFromFields($fields): genre
    {
        //
        // liaison entre la donnée BDD et l'objet 
        // ici on voit le chainage ->setId->setName 
        //
        $genre = new genre();
        $genre->setId($fields['id'])
              ->setname($fields['name']);           

        return $genre;
    }




}
