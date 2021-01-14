<?php 

namespace mvc_objet\Models\Entities;

class Movie
{

    private $id;
    private $title;
    private $description;
    private $duration;
    private $date;
    private $cover_image;
    private $genre_id;
    private $director_id;
    private $actor;
    
   

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

/***********************************************************/
    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

/***********************************************************/

  /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Movie
     */
    public function setDescription(string $description): Movie
    {
        $this->description = $description;
        return $this;
    }

    /***********************************************************/

  /**
     * @return string
     */
    public function getDuration(): string
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return Movie
     */
    public function setDuration(string $duration): Movie
    {
        $this->duration = $duration;
        return $this;
    }

    /***********************************************************/

    
  /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param date $date
     * @return Movie
     */
    public function setDate(string $date): Movie
    {
        $this->date = $date;
        return $this;
    }

    /***********************************************************/


  /**
     * @return string
     */
    public function getCoverImage(): string
    {
        return $this->cover_image;
    }

    /**
     * @param string $cover_image
     * @return Movie
     */
    public function setCoverImage(string $cover_image): Movie
    {
        $this->cover_image = $cover_image;
        return $this;
    }

    /***********************************************************/
      /**
     * @return int
     */
    public function getGenreId(): Genre
    {
        return $this->genre_id;
    }

    /**
     * @param int $genre_id
     * @return Movie
     */
    public function setGenreId(Genre $genre_id): Movie
    {
        $this->genre_id = $genre_id;
        return $this;
    }

/***********************************************************/
  /**
     * @return int
     */
    public function getDirectorId(): Director
    {
        return $this->director_id;
    }

    /**
     * @param int $director_id
     * @return Movie
     */
    public function setDirectorId(Director $director_id): Movie
    {
        $this->director_id = $director_id;
        return $this;
    }

/***********************************************************/
public function getActor(): Actor
{
    return  $this->actor;
}

public function setActor(): Movie
{
    $this->actor = $actor;
    return $this;
} 

public function addActor(Actor $actor): void
{
    if (is_array($this->actors) || is_object($this->actors))
    {
        foreach ($this->actors as $a)
        {
            if ($a->getId() == $actor->getId())
            {
                return;
            }
        } 
    }
    $this->actors[] = $actor;
}

public function deleteActor(Actor $actor): void
{
    $this->actors = array_filter($this->actors, function (Actor $a) use ($actor){
        return $a->getId() != $actor->getId;
    });
}
}