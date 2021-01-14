<?php

namespace mvc_objet\Models\Daos;

use mvc_objet\Models\Entities\Movie;

use DateTime;

class MovieDao extends BaseDao
{


    public function findById($id): Movie
    {
        $stmt = $this->db->prepare("SELECT * FROM movie WHERE id = :id");
        $res = $stmt->execute([':id' => $id]);

        if($res){
            return $stmt->fetchObject(Movie::class);
        } else {
            throw new \PDOException($stmt->errorInfo()[2]);
        }
    }
    

    public function createObjectFromFields($fields): Movie
    {
        //
        // liaison entre la donnée BDD et l'objet 
        // ici on voit le chainage ->setId->setName 
        //
        $movie = new Movie();
        $movie->setId($fields['id'])
              ->setTitle($fields['title'])
              ->setDescription($fields['description'])   
              ->setDate(\DateTime::createFromFormat('Y-m-d', $fields['date']))
              ->setCoverImage($fields['cover_image'])
              -setDuration($fields['duration']);
              -setGenreId($fields['genre_id']);
              -setDirectorId($fields['director_id']);

        return $movie;
    }

    public function create(Movie $movie)
    {
        $stmt = $this->db->prepare("
        INSET INTO movie(title, description, duration, date, cover_image, genre_id, director_id)
        VALUES(:title, :description, :duration, :date, :cover_image, :genre_id, :director_id)");

        $res = $stmt->execute([
            ':title' => $movie->getTitle(),
            ':description' => $movie->getDescription(),
            ':duration' => $movie->getDuration(),
            ':date' => $movie->getDate(),
            ':cover_image' => $movie->getCoverImage(),
            ':genre_id' => $movie->getGenreId(),
            ':director_id' => $movie->getDirectorId()
        ]);

    if (!$res) {
        throw new \PDOexception($stmt->errorinfo()[2]);
    }
    }




}